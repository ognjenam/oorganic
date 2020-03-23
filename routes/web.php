<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


  Route::get('/{parameter?}', 'CategoryController@index') -> where ('parameter', 'home'); // home

  Route::get('/products', 'ProductController@products'); // products

  Route::get('/products/{id}', 'ProductController@product') -> where(['id' => '[1-9]\d*']); // product by id

  Route::resource('/enter', 'AuthController'); // enter - log in, sign up

  Route::resource('/contact', 'ContactController'); // contact



  Route::get('/forgot_password', 'UserController@forgotPass');
  Route::post('/resetPass', 'UserController@resetPass');

  Route::get('/change_password', 'UserController@changePass') -> middleware(['isLoggedIn']);
  Route::post('/changePass', 'UserController@updatePass');

  Route::get('/shopping_cart', 'UserController@shoppingCart')-> middleware(['isLoggedIn']);
  Route::post('/add_to_cart', 'UserController@addToCart') -> name('addToCart');
  Route::post('/remove_from_cart', 'UserController@removeFromCart') -> name('removeFromCart');

  Route::get('/checkout', 'UserController@checkout') -> name('checkout') -> middleware(['isLoggedIn']);
  Route::post('/checkout', 'UserController@finalCheckout') -> name('finalCheckout');

  Route::post('/search', 'ProductController@searchProduct') -> name('searchProductByName'); // product search by name


  Route::post('/filterProductsByCategory', 'ProductController@productsByCategory') -> name('filterProductsByCategory'); // ajax - products filter by category

  Route::post('/login', 'AuthController@login'); // enter -> login form
  Route::post('/register', 'AuthController@register');  // enter -> register form

  Route::resource('/account', 'UserController') -> middleware(['isLoggedIn']); // user account
  Route::get('/delete_image', 'UserController@deleteImg') -> middleware(['isLoggedIn']); // user img delete

  Route::get('/logout', 'AuthController@logout') -> middleware(['isLoggedIn']); // logout

  Route::post('/updateUser', 'UserController@updateUser') -> name('updateUser') -> middleware(['isLoggedIn']); // ajax - user

  Route::post('/contactForm', 'ContactController@contactForm') -> name('contactForm');


  Route::group(['prefix' => '/dashboard', 'middleware' => ['isLoggedIn', 'admin']], function(){ // dashboard
      Route::resource('', 'DashboardController'); // admin panel

      Route::get('/logs', 'UserController@displayLogs') -> name('logs');

      Route::get('/orders', 'DashboardController@getOrders');
      Route::get('/users', 'UserController@adminUsers');

      Route::group(['prefix' => '/categories'], function(){ // categories

      Route::get('', 'CategoryController@adminCategories');

      Route::get('/add', 'CategoryController@addNewCategory');
      Route::post('/addCategory', 'CategoryController@addCategory') -> name('addCategory');

      Route::get('/edit/{id}', 'CategoryController@editCategory') -> where(['id' => '[1-9]\d*']);
      Route::post('/editCategory', 'CategoryController@updateCategory') -> name('editCategory');

      Route::delete('/delete/{id}', 'CategoryController@destroy') -> where(['id' => '[1-9]\d*']);




    });


    Route::group(['prefix' => '/products'], function(){ // products

      Route::get('', 'ProductController@adminProducts');

      Route::get('/add', 'ProductController@addNewProduct');
      Route::post('/addProduct', 'ProductController@addProduct') -> name('addProduct');

      Route::get('/edit/{id}', 'ProductController@editProduct') -> where(['id' => '[1-9]\d*']);
      Route::post('/editProduct', 'ProductController@updateProduct') -> name('editProduct');

      Route::delete('/delete/{id}', 'ProductController@destroyProduct') -> where(['id' => '[1-9]\d*']);




    });



  });
