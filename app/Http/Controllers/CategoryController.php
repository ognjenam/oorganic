<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Validator;
use File;

class CategoryController extends Controller
{
  private $categoryModel;
  public function __construct()
  {
    $this -> categoryModel = new Category();
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $categories = $this -> categoryModel  -> getAllCategories();
      return view('pages/main/home', ['categories' => $categories]); // pocetna home str, prikaz svih kategorija
    }
    public function editCategory($id){


      $category = $this -> categoryModel -> getCategoryById($id);

      return view('/pages/dashboard/edit_category', ['category' => $category]);

    }

    public function updateCategory(Request $request)
    {
      $category_name = $request -> category;
      $category_id = $request -> category_id;

      $edit_category_validator = Validator::make($request -> all(), [
        'category' => 'required|regex:/^([A-z](\s[A-z])*){3,15}$/'
      ]);

      if($edit_category_validator -> fails())
      {
        $edit_name_error = '';

        if($edit_category_validator -> errors() -> any('category'))
        {
          $edit_name_error = $edit_category_validator -> errors() -> first('category');

          return response(['name_error' => $edit_name_error]);
        }

      }

      else {
          $categoryAlreadyExists_  = $this -> categoryModel -> getCategoryByName($category_name);
          if($categoryAlreadyExists_ != null)
          {
            $edit_name_error = 'Sorry, this category name already exists!';
            return response(['name_error' => $edit_name_error]);
          }

          else {
            try{
              $categoryNameinDB = $this -> categoryModel -> getCategoryNameById($category_id);
              File::move('main/images/' .$categoryNameinDB[0] -> name, 'main/images/' .$category_name);
              $updated = $this -> categoryModel -> updateCategory($category_id, $category_name);
              return response(['updated' => 'success'], 204);
            }

            catch(\PDOException $e)
            {
              \Log::error($e -> getMessage());
              return response(['updated' => 'error'], 500);
            }
          }
      }
    }
    public function adminCategories()
    {

      $categories = $this -> categoryModel -> getAllCategoriesPaginate();

      return view('/pages/dashboard/categories', ['categories' => $categories]);
    }
    public function addNewCategory()
    {
      return view('/pages/dashboard/add_category');
    }
    public function addCategory(Request $request)
    {
      $category_name = $request -> category_name;

      $validator = Validator::make($request -> all(),[
        'category_name' => 'required|regex:/^([A-z](\s[A-z])*){3,15}$/'
      ]);

      if($validator -> fails())
      {
        $name_error = '';


        if($validator -> errors() -> any('category_name'))
        {
          $name_error = $validator -> errors() -> first('category_name');

          return response(['name_error' => $name_error]);
        }


      }

      else {
        $categoryAlreadyExists  = $this -> categoryModel -> getCategoryByName($category_name);
        if($categoryAlreadyExists != null)
        {
          $name_error = 'Sorry, this category name already exists!';
          return response(['name_error' => $name_error]);
        }

        else {

            try{
              $inserted = $this -> categoryModel -> addCategory($category_name);
              return response(['inserted' => 'success'], 201);
            }

            catch(\PDOException $e)
            {
              \Log::error($e -> getMessage());
              return response(['inserted' => 'error'], 500);
            }




        }
      }
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

        $category = $this -> categoryModel -> getCategoryById($id);


        if($category != null)
        {
          File::deleteDirectory(public_path('/main/images/' . $category -> name));
          $this -> categoryModel -> deleteCategory($id);
          return redirect('/dashboard/categories');
        }
    }
}
