@extends('layouts/templateUser')

@section('content')
<div class="col-12">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Edit a product</h4>
      <form id='edit-product' method='post' name='edit-product' class="form-sample" enctype='multipart/form-data'>
        @csrf
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Name</label>
              <div class="col-sm-9">
                <input type="text" id='edit-product-name' name='edit-product-name' class="form-control" autofocus value='{{$product -> name}}'/>
                <span class='errors-span' id='edit-product-name-error'></span>
              </div>

            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Price</label>
              <div class="col-sm-9">
                <input type="text" id='edit-product-price' name='edit-product-price' value='{{$product -> price}}' class="form-control" />
                <span class='errors-span' id='edit-product-price-error'></span>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Category</label>
              <div class="col-sm-9">
                <select disabled id='edit-product-categories' name='edit-product-categories' class="text-capitalize form-control">
                  <option selected value="{{$product -> category_ID}}">{{$product -> categoryName}}</option>


                </select>
                <span class='errors-span' id='edit-product-category-error'></span>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Description</label>
              <div class="col-sm-9">
              <textarea id='edit-product-description' name="edit-product-description">{{$product -> description}}</textarea>
              <span class='errors-span' id='edit-product-description-error'></span>


              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Image</label>
              <div class="col-sm-9">
              <input type="file" id='edit-product-file' name="edit-product-image" value="">
              <img class='edit-img-product' src="{{asset('main/images/' . $product -> categoryName . '/' . $product -> path)}}" alt="">
              <button type='button' id='edit-product-image-btn'  class="btn btn-block btn-lg btn-gradient-primary add mt-4">Upload</button>
              <span class='errors-span' id='edit-product-image-error'></span>


              </div>
            </div>
          </div>

        </div>
        <div class="row">
          <div class="col-md-3">
            <button type='button' data-id='{{$product -> product_ID}}' id='edit-product-btn' name='edit-product-btn' class="btn btn-block btn-lg btn-gradient-primary add mt-4">Edit</button>
            <span class='errors-span' id='edit-product-error'></span>
          </div>
        </div>



      </form>
    </div>
  </div>
</div>
@endsection
