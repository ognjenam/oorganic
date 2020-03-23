@extends('layouts/templateUser')

@section('content')

<div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Categories</h4>


                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th> <strong># </strong></th>
                          <th> <strong>Name </strong> </th>
                          <th> <strong>Total products</strong> </th>
                          <th>  </th>
                          <th>  </th>
                        </tr>

                      </thead>

                      <tbody>


                        @foreach($categories as $c)
                          @component('components.adminCategory', ['c' => $c])
                          @endcomponent
                        @endforeach




                      </tbody>
                    </table>
                    <div class='pagination-links'>
                      {{$categories -> links()}}
                    </div>
                  </div>
                </div>
              </div>

@endsection
