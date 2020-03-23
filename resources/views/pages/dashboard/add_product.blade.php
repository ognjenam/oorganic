@extends('layouts/templateUser')

@section('content')

<div class="col-12">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Add new product</h4>
      <form id='add-product' method='post' name='add-product' class="form-sample" enctype='multipart/form-data'>
        @csrf
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Name</label>
              <div class="col-sm-9">
                <input type="text" id='product-name' name='product-name' class="form-control" />
                <span class='errors-span' id='add-product-name-error'></span>
              </div>

            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Price</label>
              <div class="col-sm-9">
                <input type="text" id='product-price' name='product-price' class="form-control" />
                <span class='errors-span' id='add-product-price-error'></span>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Category</label>
              <div class="col-sm-9">
                <select id='product-categories' name='product-categories' class="text-capitalize form-control">
                  <option value="0">Choose...</option>
                  @foreach($categories as $c)
                    @component('components.categoryDashboard', ['c' => $c])
                    @endcomponent
                  @endforeach

                </select>
                <span class='errors-span' id='add-product-category-error'></span>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Description</label>
              <div class="col-sm-9">
              <textarea id='product-description' name="product-description"></textarea>
              <span class='errors-span' id='add-product-description-error'></span>


              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Image</label>
              <div class="col-sm-9">
              <input type="file" id='product-file' name="add-product-image" value="">
              <button type='button' id='add-product-image-btn'  class="btn btn-block btn-lg btn-gradient-primary add mt-4">Upload</button>
              <span class='errors-span' id='add-product-image-error'></span>


              </div>
            </div>
          </div>

        </div>
        <div class="row">
          <div class="col-md-3">
            <button type='button' id='add-product-btn' name='add-product-btn' class="btn btn-block btn-lg btn-gradient-primary add mt-4">Add</button>
            <span class='errors-span' id='add-product-error'></span>
          </div>
        </div>



      </form>
    </div>
  </div>
</div>

@endsection
