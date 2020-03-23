<?php

namespace App\Models;


class Category {

  public function getAllCategories()
  {
    return \DB::table('category AS c') -> select('c.name', 'c.category_ID',  \DB::raw('count(p.product_ID) AS productsNumber')) -> leftJoin('product AS p', 'c.category_ID', '=', 'p.category_ID')  -> groupBy('c.name', 'c.category_ID') -> orderBy('c.category_ID', 'asc')-> get();
  }
  public function getAllCategoriesPaginate()
  {
    return \DB::table('category AS c') -> select('c.name', 'c.category_ID',  \DB::raw('count(p.product_ID) AS productsNumber')) -> leftJoin('product AS p', 'c.category_ID', '=', 'p.category_ID')  -> groupBy('c.name', 'c.category_ID') -> orderBy('c.category_ID', 'asc')-> paginate(5);
  }
  public function getCategoryById($id)
  {
    return \DB::table('category') -> where('category_ID', '=', $id) -> first();
  }
  public function deleteCategory($id)
  {
    return \DB::table('category') -> where(['category_ID' =>  $id]) -> delete();
  }
  public function countAllCategories()
  {
    return \DB::table('category') -> select('name as categoryNumber') -> count();
  }
  public function updateCategory($id, $name)
  {
    return \DB::table('category') -> where('category_ID', '=', $id) -> update(['name' => strtolower($name)]);
  }

  public function getCategoryNameById($id)
  {
    return \DB::table('category') -> select('name') -> where('category_ID', '=', $id) -> get();
  }

  public function getCategoryByName($name)
  {
    return \DB::table('category') -> where('name', '=', strtolower($name)) -> first();
  }

  public function addCategory($name)
  {
     return \DB::table('category') -> insert(['name' => strtolower($name)]);
  }


}
