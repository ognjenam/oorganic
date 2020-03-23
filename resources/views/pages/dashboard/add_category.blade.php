@extends('layouts/templateUser')

@section('content')

<div class="col-12">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Add new category</h4>
      <form class="form-sample">
        @csrf
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Name</label>
              <div class="col-sm-9">
                <input type="text" id='add-category-name' name='category-name' class="form-control" />
                <span class='errors-span' id='add-category-error'></span>
              </div>
            </div>
          </div>




        </div>
        <div class="row">
          <div class="col-md-3">
            <button type='button' id='add-category' name='add-category-btn' class="btn btn-block btn-lg btn-gradient-primary add mt-4">Add</button>
            <span class='errors-span' id='add-category-error-span'></span>
          </div>
        </div>






      </form>
    </div>
  </div>
</div>

@endsection
