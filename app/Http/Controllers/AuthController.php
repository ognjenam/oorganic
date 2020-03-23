<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
  private $userModel;
  public function __construct()
{
  $this -> userModel = new User();
}

  public function login(LoginRequest $request)
  {

    $username_login = $request -> input('login-username');
    $password_login = $request -> input('login-password');

    $login_error = '';



    $usernameExists = $this -> userModel -> getUsername($username_login);

    if($usernameExists)
    {
      $isPasswordGood = $this -> userModel -> getPassword($password_login);

      if($isPasswordGood)
      {
        $user = $this -> userModel -> getByUsernameAndPassword($username_login, $password_login);
        $user_id = $user -> user_ID;
        $this -> userModel -> setUserToActive($user_id);

        $request -> session() -> put('user', $user);

        // created session
        return redirect('/home');


      }

      else {
        $login_error = 'Password is not good!';
        return redirect('/enter') -> with('passwordIsNotGood', $login_error);
      }
    }

    else {
      $login_error = 'Username not exists!';
      return redirect('/enter') -> with('usernameNotExists', $login_error);
    }










  }

  public function register(RegisterRequest $request)
  {
    $email_register = $request -> input('register-email');
    $username_register = $request -> input('register-username');
    $password_register = $request -> input('register-password');

    $register_error_username = '';
    $register_error_email = '';



    $usernameExists = $this -> userModel -> getUsername($username_register);
    $emailExists = $this -> userModel -> getEmail($email_register);

    if($usernameExists)
    {
      $register_error_username = 'Username already exists!';
      return redirect('/enter') -> with('usernameAlreadyExists', $register_error_username);
    }

    if($emailExists)
    {
      $register_error_email = 'Email already exists!';
      return redirect('/enter') -> with('emailAlreadyExists', $register_error_email);
    }

    // created user

    $this -> userModel -> newUser($username_register, $email_register, $password_register);
    $created_user_id = $this -> userModel -> getUserID($username_register) -> user_ID;


    $inserted_image = $this -> userModel -> newUserImage($created_user_id);
    return redirect('/enter');



  }

  public function logout(Request $request)
  {

    $user_id = $request -> session() -> get('user') -> user_ID;

    $this -> userModel -> setUserToNotActive($user_id);

    $request -> session() -> forget('user');
    $request -> session() -> flush();

    return redirect('/home');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages/main/enter');
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
        //
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
