<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;

class DashboardController extends Controller
{
  private $categoryModel;
  private $productModel;
  private $userModel;
  public function __construct()
  {
    $this -> categoryModel = new Category();
    $this -> productModel = new Product();
    $this -> userModel = new User();
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


      $numberOfCategories = $this -> categoryModel -> countAllCategories();
      $numberOfProducts = $this -> productModel -> countAllProducts();
      $activeUsers = $this -> userModel -> countActiveUsers();



      return view('/pages/dashboard/content',
      ['activeUsers' => $activeUsers,
      'numberOfCategories' => $numberOfCategories,
      'numberOfProducts' => $numberOfProducts]
      );
    }

    public function getOrders()
    {
      $orders = $this -> userModel -> getAllOrders();

      return view('/pages/dashboard/orders', ['orders' => $orders]);
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
