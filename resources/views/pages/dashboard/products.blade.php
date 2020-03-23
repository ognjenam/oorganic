@extends('layouts/templateUser')

@section('content')


<div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Products</h4>


                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th> <strong># </strong></th>
                          <th> <strong>Image </strong></th>
                          <th> <strong>Name </strong> </th>
                          <th> <strong>Description</strong> </th>
                          <th> <strong>Price</strong> </th>
                          <th> <strong>Category</strong> </th>
                          <th>  </th>
                          <th>  </th>
                        </tr>

                      </thead>
                      <tbody>

                        @foreach($products as $p)
                          @component('components.adminProduct', ['p' => $p])
                          @endcomponent
                        @endforeach





                      </tbody>

                    </table>
                    <div class='pagination-links'>
                      {{$products -> links()}}
                    </div>

                  </div>
                </div>
              </div>
@endsection
