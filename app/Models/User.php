<?php

namespace App\Models;


class User {


  public function getByUsernameAndPassword($username, $password)
  {
    return \DB::table('user AS u')
      -> select('u.user_ID', 'u.role_ID', 'u.username', 'u.email', 'u.active', 'u.last_active', 'u.registration_date','r.name')
      -> join('role AS r', 'u.role_ID', '=', 'r.role_ID')
      -> where([
            ['username', '=', $username],
            ['password', '=', md5($password)]
          ])
        -> first();
  }
  public function getByEmail($email){
    return \DB::table('user AS u')
      -> select('u.user_ID', 'u.role_ID', 'u.username', 'u.email', 'u.active', 'u.last_active', 'u.registration_date','r.name')
      -> join('role AS r', 'u.role_ID', '=', 'r.role_ID')
      -> where([
            ['email', '=', $email]
          ])
        -> first();
  }
  public function getImagePathByUser($username)
  {
    return \DB::table('user AS u')
    -> select('ui.path')
    -> join('user_image AS ui', 'u.user_ID', '=', 'ui.user_ID')
    -> where('u.username', '=', $username)
    -> first();
  }
  public function resetPassword($user_id, $pass)
  {
    return \DB::table('user')
      -> where('user_ID', '=', $user_id)
      -> update(['password' => md5($pass)]);
  }
  public function getAllUsers()
  {
    return \DB::table('user AS u')
    -> select('u.user_ID', 'u.username', 'u.email', 'u.active', 'u.last_active', 'u.registration_date', 'ui.path', 'r.name AS roleName')
    -> join('user_image AS ui', 'u.user_ID', '=', 'ui.user_ID')
    -> join('role AS r', 'r.role_ID', '=', 'u.role_ID')
    -> orderBy ('u.user_ID', 'asc')
    -> paginate(5);
  }
  public function getShoppingCart($user_id)
  {
    return \DB::table('user AS u')
    -> join('user_cart AS uc', 'u.user_ID', '=', 'uc.user_ID')
    -> join('product AS p', 'p.product_ID', '=', 'uc.product_ID')
    -> select('uc.*', 'p.name', 'p.price')
    -> get();
  }
  public function addToCart($user_id, $product_id)
  {
    $date_addToCart = date('Y:m:d H:i:s');
    return \DB::table('user_cart')
      -> insert(['user_ID' => $user_id, 'product_ID' => $product_id, 'date' => $date_addToCart]);

  }
  public function getOrderedProducts($order_id)
  {
    return \DB::table('user_cart AS uc')
    -> select('p.name', 'p.price', 'uc.date')
    -> join('product AS p', 'uc.product_ID', '=', 'p.product_ID')
      -> where('uc.user_order_ID', '=', $order_id)
      -> get();
  }

  public function removeFromCart($id)
  {
    return \DB::table('user_cart')
      -> where('user_cart_ID', '=', $id)
      -> delete();
  }
  public function order($user_id, $name, $address, $phone)
  {
    $date = date('Y:m:d H:i:s');
    return \DB::table('user_order')
    ->insertGetId(['user_ID' => $user_id, 'name' => $name, 'address' => $address, 'phone' => $phone, 'ordered' => 1, 'date' => $date]);


  }
  public function getAllOrders()
  {
    return \DB::table('user_order AS uo')
    -> select('uo.user_order_ID', 'uo.address', 'uo.phone', 'uo.total_price', 'uo.ordered', 'uo.date', 'u.username', \DB::raw('count(uc.user_cart_ID) AS productNumber'))
    -> leftJoin('user_cart AS uc', 'uc.user_order_ID', '=', 'uo.user_order_ID')
    -> join('user AS u', 'u.user_ID', '=', 'uo.user_ID')
    -> groupBy('uo.user_order_ID', 'u.username', 'uo.address', 'uo.phone', 'uo.total_price', 'uo.ordered', 'uo.date')
    -> get();
  }
  public function updateTotalPrice($order, $total_price_order)
  {
    return \DB::table('user_order AS uo')
    -> where('user_order_ID', '=', $order)
    -> update(['total_price' => $total_price_order]);
  }
  public function getOrderInfo($order_id)
  {
    return \DB::table('user_order')
    -> select('date', 'address', 'phone', 'name')
    ->where('user_order_ID', '=', $order_id)
    -> first();
  }
  public function setCartToOrdered($user_id, $order_id)
  {
    return \DB::table('user_cart')
    ->where(['user_ID' =>  $user_id, 'user_order_ID' => null])
    -> update(['user_order_ID' => $order_id, 'ordered' => 1]);

  }
  public function newUserImage($user_id)
  {
    \DB::table('user_image') -> insert(['path' => null, 'user_ID' => $user_id]);
  }
  public function updateUserImage($img, $user_id)
  {
    \DB::table('user_image') -> where('user_ID', '=', $user_id) -> update(['path' => $img]);
  }
  public function getAccountImg($user_id)
  {
    return \DB::table('user_image') ->select('path') -> where('user_ID', '=', $user_id) -> first();
  }

  public function deleteUserAccountImg($user_id)
  {
    \DB::table('user_image')-> where('user_ID', '=', $user_id) -> update(['path' => null]);
  }

  public function getUser($id)
  {
    return \DB::table('user AS u')
    -> select('ui.path', 'u.user_ID', 'u.username', 'r.name', 'u.email', 'u.registration_date')
    -> join('role AS r', 'u.role_ID', '=', 'r.role_ID')
    -> join('user_image AS ui', 'u.user_ID', '=', 'ui.user_ID')
    -> where('u.user_ID', '=', $id)
    -> first();
  }
  public function getUsername($username)
  {
    return \DB::table('user') -> select('username') -> where('username', '=', $username) -> first();
  }
  public function getUserID($username)
  {
    return \DB::table('user') -> select('user_ID') -> where('username', '=', $username) -> first();
  }

  public function getPassword($password)
  {
    return \DB::table('user') -> select('password') -> where('password', '=', md5($password)) -> first();
  }

  public function getEmail($email)
  {
    return \DB::table('user') -> select('email') -> where('email', '=', $email) -> first();
  }
  public function newUser($username, $email, $password)
  {
    $date = date('Y:m:d H:i:s');
    \DB::table('user') -> insert(['role_ID' => 2, 'username' => $username, 'email' => $email, 'password' => md5($password), 'registration_date' => $date]);
  }

  public function setUserToActive($id)
  {
    $date = date('Y-m-d H:i:s');
    \DB::table('user') -> where('user_ID', $id) -> update(['active' =>  1, 'last_active' => $date]);
  }

  public function setUserToNotActive($id)
  {

     \DB::table('user') -> where('user_ID', '=', $id) -> update(['active' => 0]);
  }

  public function countActiveUsers()
  {
    return \DB::table('user') -> where('active', '=', 1) -> count();
  }




}
