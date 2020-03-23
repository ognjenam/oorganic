@extends('layouts/templateUser')

@section('content')
          <div class="row">
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-primary card-img-holder text-white">
                <div class="card-body">

                  <h4 class="font-weight-bold mb-3">Total products
                  </h4>
                  <h2 class="mb-5">
                  {{$numberOfProducts}}

                  </h2>

                </div>
              </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-primary card-img-holder text-white">
                <div class="card-body">

                  <h4 class="font-weight-bold mb-3">Total categories
                  </h4>
                  <h2 class="mb-5">

                    {{$numberOfCategories}}

                  </h2>


                </div>
              </div>
            </div>

            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-primary card-img-holder text-white">
                <div class="card-body">

                  <h4 class="font-weight-bold mb-3">Visitors Online <i class="fa fa-eye" aria-hidden="true"></i>
                  </h4>
                  <h2 class="mb-5">
                    {{$activeUsers}}


                  </h2>
                  <h6 class="card-text"></h6>
                </div>
              </div>
            </div>
          </div>
@endsection('content')
