<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\EmailRequest;
use App\Http\Requests\PasswordRequest;
require_once app_path('Models\phpmailer\contactMailer.php');



use App\Models\User;
use Validator;
use Image;
use File;




class UserController extends Controller
{
  private $userModel;

  public function __construct()
  {
    $this -> userModel = new User();
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $user_id = session() -> get('user') -> user_ID;


      $user = $this -> userModel -> getUser($user_id);


      return view('pages/main/account', ['user' => $user]);
    }
    public function displayLogs(Request $request)
    {

      $log_file = File::get(storage_path('/logs/laravel.log'));


      return view('pages/dashboard/logs', ['log_file' => $log_file]);

    }
    public function shoppingCart()
    {
      $user = session() -> get('user');
      $shopping_cart = $this -> userModel -> getShoppingCart($user -> user_ID);

      return view('pages/main/shoppingCart', ['user' => $user], ['shopping_cart' => $shopping_cart]);
    }
    public function addToCart(Request $request)
    {
      $user_id = $request -> user_id;
      $product_id = $request -> product_id;

      try {
        $inserted = $this -> userModel -> addToCart($user_id, $product_id);

        if($inserted)
        {
          return response(['inserted' => 'success'], 201);
        }

        else {
          return response(['inserted' => 'failed'], 500);
        }
      }

      catch(\PDOException $e)
      {
        \Log::error($e -> getMessage());
      }


    }

    public function removeFromCart(Request $request)
    {
      $id = $request -> id;
      $user_id = $request -> user_id;

      $removed = $this -> userModel -> removeFromCart($id);





      if($removed)
      {
        $user_cart = $this -> userModel -> getShoppingCart($user_id);

        if($user_cart -> isEmpty())
        {
          
          return response(['user_cart' => null], 200);
        }
        else {
          return response(['user_cart' => $user_cart], 200);
        }

      }
    }

    public function checkout()
    {
      return view('pages/main/checkout');
    }
    public function finalCheckout(Request $request)
    {
      $name = $request -> name;
      $address = $request -> address;
      $phone = $request -> phone;
      $user_id = $request -> user_id;
      $user_username = session() -> get('user') -> username;
      $email = session() -> get('user') -> email;


      $checkout_validator = Validator::make($request -> all(), [
        'name' => 'required|regex:/^[A-z]{3,10}(\s[A-z]{3,10})*$/',
        'address' => 'required|regex:/^([A-z]+\s*\d*)/|min:5|max:30',
        'phone' => 'required|regex:/^\+1[0-9]{6,10}$/'

      ]);

      $error_name = '';
      $error_address = '';
      $error_phone = '';
      if($checkout_validator -> fails())
      {
        if($checkout_validator -> errors() -> any('name'))
        {
          $error_name = $checkout_validator -> errors() -> first('name');
        }

        if($checkout_validator -> errors() -> any('address'))
        {
          $error_address = $checkout_validator -> errors() -> first('address');
        }

        if($checkout_validator -> errors() -> any('phone'))
        {
          $error_phone = $checkout_validator -> errors() -> first('phone');
        }

        return response(['error_name' => $error_name, 'error_address' => $error_address, 'error_phone' => $error_phone]);
      }

      else {
        $order = $this -> userModel -> order($user_id, $name, $address, $phone);
        $setProductsToOrdered = $this -> userModel -> setCartToOrdered($user_id, $order);
        $products = $this -> userModel -> getOrderedProducts($order);
        $order_info = $this -> userModel -> getOrderInfo($order);
        $total_price_order = 0;



        if($setProductsToOrdered)
        {
          $content = 'Thank you ' . $user_username . '! :) <br>

          Order time: '. $order_info -> date . ' <br>
          Order address: '. $order_info -> address . ' <br>
          Your name: '. $order_info -> name . ' <br>
          Your phone: '. $order_info -> phone . ' <hr>
          You have been successfully ordered:<hr>';
          foreach($products as $p)
          {
            $content .= 'Product: ' . $p -> name . '<br> Product price: ' . $p -> price . ' $. <hr>';
            $total_price_order += $p -> price;
          }
          $content .= 'Total price: ' . $total_price_order . ' $';

          $update_total_price = $this -> userModel -> updateTotalPrice($order, $total_price_order);

          $order_info_emil = OrderInfo($email, $content);
          return response(['inserted' => true], 201);
        }
      }
    }
    public function changePass(){
      return view('pages/main/changePass');
    }
    public function updatePass(PasswordRequest $request)
    {

      $password = $request -> input('new_password');
      $password_verify = $request -> input('new_password_verify');

      $username = session() -> get('user') -> username;
      $user_id = session() -> get('user') -> user_ID;
      $email = session() -> get('user') -> email;



      try {
        $changed_pass = $this -> userModel -> resetPassword($user_id, $password);


        if($changed_pass)
        {
          $content_message_cng_pass = 'Dear ' . $username . ',<br> your new password is: ' . $password;

          $sent_new_pass = changePassword($email, $content_message_cng_pass);

          $result = $sent_new_pass ? 'Your password is successfully updated! Please check an e-mail!' : 'PLease try again later!';



          $this -> userModel -> setUserToNotActive($user_id);

          $request -> session() -> forget('user');
          $request -> session() -> flush();


          return redirect('/enter') -> with('changed_pass', $result);


        }

      }

      catch(\PDOException $e)
      {
        \Log::error($e -> getMessage());


      }



    }
    public function forgotPass()
    {
      return view('pages/main/forgotPass');
    }
    public function resetPass(EmailRequest $request)
    {
      $email = $request -> input('email');
      $email_verify = $request -> input('verify_email');

      $emailExists = $this -> userModel -> getByEmail($email);

      if($emailExists != null)
      {
        $user_id = $emailExists -> user_ID;
        $username = $emailExists -> username;
        $reset_pass = \Str::random(8);


        $updated_password = $this -> userModel -> resetPassword($user_id, $reset_pass);

        $content_message = 'Dear ' . $username . ',<br> your new password is: ' . $reset_pass . '<br>Don\'t forget to change! :)';

        if($updated_password)
        {
          $sent = changePassword($email, $content_message);

          $result = $sent ? 'Your password is successfully updated! Please check an e-mail!' : 'PLease try again later!';
          return back() -> with('message', $result);


        }
      }

      else {
        $result = 'Sorry, this e-mail doesn\'t exist!';
        return back() -> with('message', $result);
      }


    }

    public function adminUsers()
    {

      $users = $this -> userModel -> getAllUsers();

      return view('pages/dashboard/users', ['users' => $users]);
    }

    public function updateUser(Request $request)
    {



      $validator = Validator::make($request -> all(), [
        'image' => 'image|mimes:png,jpg,jpeg,gif|max:2000'
        // 2024 / 2MB in kb
      ]);

      if($validator -> passes()){

        \DB::beginTransaction();
        try{

          $folder = public_path('\main\images\user\/');

          $image = session() -> get('user') -> username . '_' . time() . '_' . $request -> image -> getClientOriginalName();
          $final_img = $folder . $image;



          $user_id = session() -> get('user') -> user_ID;

          $older_img = $this -> userModel -> getAccountImg($user_id);

          if($older_img != null)
          {
            if(File::exists(public_path('\main\images\user\/' .  $older_img -> path))){
              File::delete(public_path('\main\images\user\/' .  $older_img -> path));
            }
          }

          $img = Image::make($request -> image) -> save($final_img);



          $this -> userModel -> updateUserImage($image, $user_id);

          \DB::commit();

          return response(null, 204);


        }

        catch(\PDOException $e)
        {
          \Log::error($e -> getMessage());
          \DB::rollback();
          return response(505);

        }


      }
      else{
        $err = '';
        foreach($validator -> messages() -> all() as $m)
        {
          $err .= $m . '</br>';
        }
        return response($err);
      }




    }

    public function deleteImg()
    {

      $user_id = session() -> get('user') -> user_ID;



      $older_img = $this -> userModel -> getAccountImg($user_id);

      if(File::exists(public_path('\main\images\user' . '\\' . $older_img -> path))){
        File::delete(public_path('\main\images\user' . '\\' . $older_img -> path));
      }

      $this -> userModel -> deleteUserAccountImg($user_id);

      return redirect() -> back();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
