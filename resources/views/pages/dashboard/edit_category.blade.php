@extends('layouts.templateUser')

@section('content')
<div class="col-12">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Edit a category</h4>
      <form id='edit-category' method='post' name='edit-category' class="form-sample">
        @csrf
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Name</label>
              <div class="col-sm-9">
                <input type="text" id='edit-category-name' name='edit-category-name' class="form-control" autofocus value='{{$category -> name}}'/>
                <span class='errors-span' id='edit-category-name-error'></span>
              </div>

            </div>
          </div>

        </div>

        <div class="row">
          <div class="col-md-3">
            <button type='button' data-id='{{$category -> category_ID}}' id='edit-category-btn' name='edit-category-btn' class="btn btn-block btn-lg btn-gradient-primary add mt-4">Edit</button>
            <span class='errors-span' id='edit-category-error'></span>
          </div>
        </div>



      </form>
    </div>
  </div>
</div>

@endsection
