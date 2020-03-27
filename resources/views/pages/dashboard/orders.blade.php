@extends('layouts.templateUser')

@section('content')

<div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body scroll-table">
                    <h4 class="card-title">Orders</h4>


                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th> <strong># </strong></th>
                          <th> <strong>User </strong> </th>
                          <th> <strong>Address</strong> </th>
                          <th> <strong>Phone</strong> </th>
                          <th> <strong>Order date</strong> </th>
                          <th> <strong>Quantity</strong> </th>
                          <th> <strong>Total price</strong> </th>

                        </tr>

                      </thead>
                      <tbody>

                        @foreach($orders as $o)
                          @component('components.userOrder', ['o' => $o])

                          @endcomponent
                        @endforeach








                      </tbody>
                    </table>
                    <div class='pagination-links'>
                      {{$orders -> links()}}
                    </div>
                  </div>
                </div>
              </div>

@endsection
