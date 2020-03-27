<?php

namespace App\Http\Controllers;
use Validator;
use Image;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Category;
use \Psy\Util\Json;
use File;



class ProductController extends Controller
{

    private $categoryModel;
    private $productModel;
    public function __construct()
    {
      $this -> categoryModel = new Category();
      $this -> productModel = new Product();
    }

    public function products()
    {


      $products = $this -> productModel -> getAllProducts();
      $categories = $this -> categoryModel -> getAllCategories();

      return view('pages/main/products', ['products' => $products], ['categories' => $categories]);
    }

    public function product($id)
    {
      $productModel = new Product();
      $product = $this -> productModel -> getOneProduct($id);


      if($product != null)
      {
        return view('pages/main/product', ['product' => $product]);
      }

      else {
        abort(404);
      }



    }


    public function searchProduct(Request $request)
    {

      if($request -> value != '')
      {
        $value = '%' . strtolower($request -> value) .'%';

        $product = $this -> productModel -> filterProductByName($value);

        return response(['product' => $product]);
      }


      else {
        return response(['product' => null]);
      }



    }



    public function productsByCategory(Request $request)
    {

      $category_id = $request -> category_id;


      if($category_id == 0)
      {

        $products = $this -> productModel -> getAllProductsAjax();
      }

      else {
        $products = $this -> productModel -> getProductsByCategoryId($category_id);
      }

      return JSON::encode($products);
    }

    public function addNewProduct()
    {
      $categories = $this -> categoryModel -> getAllCategories();
      return view('/pages/dashboard/add_product', ['categories' => $categories]);
    }

    public function adminProducts()
    {

      $products = $this -> productModel -> getAllProductsPaginate();
      return view('/pages/dashboard/products', ['products' => $products]);
    }

    public function addProduct(Request $request)
    {

      $validator = Validator::make($request -> all(), [
        'product_name' => 'required|regex:/^([A-z](\s[A-z])*){3,30}$/',
        'product_price' => 'required|regex:/^[1-9]\d?\.[1-9]\d$/',
        'product_description' => 'required|regex:/([A-z]\d*\W*){5,200}/',
        'product_category' => 'not_in:0',
        'image' => 'image|mimes:jpeg,jpg,png,gif|max:2000'
        // laravel works with KB -> 2MB -> 2000KB
      ]);
      if($validator -> fails())
      {
        $name_error = '';
        $price_error = '';
        $description_error = '';
        $category_error = '';
        $image_error = '';


        if($validator -> errors() -> any('product_name'))
        {
          $name_error = $validator -> errors() -> first('product_name');

        }
        if($validator -> errors() -> any('product_price'))
        {
          $price_error = $validator -> errors() -> first('product_price');
        }

        if($validator -> errors() -> any('product_description'))
        {
          $description_error = $validator -> errors() -> first('product_description');
        }

        if($validator -> errors() -> any('product_category'))
        {
          $category_error = $validator -> errors() -> first('product_category');
        }
        if($validator -> errors() -> any('image'))
        {
          $image_error = $validator -> errors() -> first('image');
        }

        return response([
           'name_error' => $name_error ,
          'price_error' => $price_error,
          'description_error' => $description_error,
          'category_error' => $category_error,
          'image_error' => $image_error
        ]);


      }

      else {

        \DB::beginTransaction();
        try{

          $category_name =  $this -> categoryModel -> getCategoryNameById($request -> product_category);
          $img_final_path = time() . '_' . $request -> image -> getClientOriginalName();


          if(!File::isDirectory(public_path('\main\images' . '\\' . $category_name[0] -> name)))
          {
            File::makeDirectory(public_path('\main\images' . '\\' . $category_name[0] -> name, 0755, true, true));
          }



          $image_path = public_path('\main\images' . '\\' . $category_name[0] -> name . '\\' . $img_final_path);

          $final_image = Image::make($request -> image) -> resize(720, 600) -> save($image_path);


          $created_product_id = $this -> productModel -> addNewProduct($request -> product_category, $request -> product_name, $request -> product_description, $request -> product_price);
          $this -> productModel -> addNewImageForProduct($created_product_id, $img_final_path);
          \DB::commit();


          return response(['inserted' => 'success'], 201);

        }

        catch(\PDOException $e)
        {
          \Log::error($e -> getMessage());

          \DB::rollback();

          return response(['inserted' => 'error'], 500);

        }

      }
    }



public function updateProduct(Request $request){
  $validator_edit = Validator::make($request -> all(), [
    'name' => 'required|regex:/^([A-z](\s[A-z])*){3,30}$/',
    'price' => 'required|regex:/^[1-9]\d?\.[1-9]\d$/',
    'description' => 'required|regex:/([A-z]\d*\W*){5,200}/',
    'image' => 'image|nullable|mimes:jpeg,jpg,png,gif|max:2000'


  ]);


  if($validator_edit -> fails())
  {
    $name_edit_error = '';
    $price_edit_error = '';
    $description_edit_error = '';
    $image_edit_error = '';

    if($validator_edit -> errors() -> any('image'))
    {
      $image_edit_error = $validator_edit -> errors() -> first('image');
    }

    else {
      $image_edit_error = $request -> image -> getClientOriginalName();
    }



    if($validator_edit -> errors() -> any('description'))
    {
      $description_edit_error = $validator_edit -> errors() -> first('description');
    }

    if($validator_edit -> errors() -> any('price'))
    {
      $price_edit_error = $validator_edit -> errors() -> first('price');
    }

    if($validator_edit -> errors() -> any('name'))
    {
      $name_edit_error = $validator_edit -> errors() -> first('name');
    }

    return response([
      'name_error' => $name_edit_error ,
      'price_error' => $price_edit_error,
      'description_error' => $description_edit_error,
      'image_error' => $image_edit_error
    ]);


  }

  else {
    $product_id = $request -> product_id;

    \DB::beginTransaction();
    try{

      if($request -> image != null)
      {
        $img_final_path_edit = time() . '_' . $request -> image -> getClientOriginalName();
        $category_name_ =  $this -> categoryModel -> getCategoryNameById($request -> category_id);
        $product_old_path = $this -> productModel -> getOneProduct($product_id);


        if(File::exists(public_path('\main\images' . '\\' . $category_name_[0] -> name . '\\' . $product_old_path -> path)))
        {
          File::delete(public_path('\main\images' . '\\' . $category_name_[0] -> name . '\\' . $product_old_path -> path));

          $image_path_edit = public_path('\main\images' . '\\' . $category_name_[0] -> name . '\\' . $img_final_path_edit);

          $final_image_edit = Image::make($request -> image) -> resize(720, 600) -> save($image_path_edit);

          $this -> productModel -> updateImageForProduct($product_id, $img_final_path_edit);
        }



      }


      $updated_product = $this -> productModel -> updateProduct($product_id, $request -> name, $request -> description, $request -> price);


      \DB::commit();


      return response(['updated' => 'success'], 204);

    }
    catch(\PDOException $e)
    {
      \Log::error($e -> getMessage());

      \DB::rollback();

      return response(['updated' => 'error'], 500);
    }

  }


}



public function destroyProduct($id)
{
  \DB::beginTransaction();
  try{

    $product_image = $this -> productModel -> getOneProduct($id);
    if($product_image != null)

    {
      $product_category = $this -> productModel -> getCategoryNameByProductId($id);

      $full_path = $product_category -> categoryName . '/' . $product_image -> path;


      if(File::exists(public_path('/main/images/' . $full_path)))
      {
        File::delete(public_path('/main/images/' . $full_path));
        $deleted = $this -> productModel -> deleteProduct($id);



      }

      \DB::commit();


    }
    return redirect('/dashboard/products');


  }

  catch(\PDOException $e)
  {
    \Log::error($e -> getMessage());
    \DB::rollback();
  }
}

public function editProduct($id)
{
  try{
    $product = $this -> productModel -> getOneProduct($id);
    return view('pages/dashboard/edit_product', ['product' => $product]);
  }

  catch(\PDOException $e)
  {
    \Log::error($e -> getMessage());
  }

}
}
