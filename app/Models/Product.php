<?php


namespace App\Models;


class Product {


  public function getAllProducts()
  {
    return \DB::table('product AS p') -> select('p.*', 'c.name AS categoryName', 'i.path AS path')  -> join('image AS i', 'p.product_ID', '=', 'i.product_ID') -> join('category AS c', 'p.category_ID', '=', 'c.category_ID') -> orderBy('p.product_ID', 'asc') -> paginate(5);
  }

  public function getAllProductsAjax()
  {
    return \DB::table('product AS p') -> select('p.*', 'c.name AS categoryName', 'i.path AS path')  -> join('image AS i', 'p.product_ID', '=', 'i.product_ID') -> join('category AS c', 'p.category_ID', '=', 'c.category_ID') -> orderBy('p.product_ID', 'asc') -> get();
  }

  public function getOneProduct($id)
  {
    return \DB::table('product AS p') -> select('p.*', 'c.name AS categoryName', 'i.path AS path') -> join('image AS i', 'p.product_ID', '=', 'i.product_ID') -> join('category AS c', 'p.category_ID', '=', 'c.category_ID') -> where('p.product_ID', $id) -> first();
  }

  public function getProductsByCategoryId($id)
  {
    return \DB::table('product AS p') -> select('p.*', 'c.name AS categoryName', 'i.path AS path')  -> join('image AS i', 'p.product_ID', '=', 'i.product_ID') -> join('category AS c', 'p.category_ID', '=', 'c.category_ID') -> where('p.category_ID', $id) -> get();
  }

  public function countAllProducts()
  {
    return \DB::table('product') -> select('product.product_ID AS productNumber') -> count();
  }

  public function filterProductByName($value)
  {
    return \DB::table('product AS p')
    -> select('p.*', 'c.name AS categoryName', 'i.path AS path')
    -> join('category AS c', 'c.category_ID', '=', 'p.category_ID')
    -> join('image AS i', 'p.product_ID', '=', 'i.product_ID') 
    -> where('p.name', 'like', $value) -> get();
  }

  public function addNewProduct($category, $name, $descr, $price)
  {
    return \DB::table('product') -> insertGetId(['category_ID' => $category, 'name' => strtolower($name), 'description' => $descr, 'price' => $price]);
  }

  public function addNewImageForProduct($product_id, $path)
  {
    \DB::table('image') -> insert(['product_ID' => $product_id, 'path' => $path]);
  }

  public function updateImageForProduct($product_id, $path)
  {
    \DB::table('image') -> where('product_ID', '=', $product_id) -> update(['path' => $path]);
  }
  public function updateProduct($product_id, $name, $descr, $price){
    \DB::table('product') -> where('product_ID', '=', $product_id) -> update(['name' => strtolower($name), 'description' => $descr, 'price' => $price]);
  }
  public function getCategoryNameByProductId($id)
  {
    return \DB::table('product AS p')
    -> select('c.name AS categoryName')
    -> join('category AS c', 'p.category_ID', '=', 'c.category_ID')
    -> where('p.product_ID', '=', $id)
    -> first();
  }

  public function deleteProduct($id)
  {
    return \DB::table('product') -> where('product_ID', '=', $id) -> delete();
  }
}
