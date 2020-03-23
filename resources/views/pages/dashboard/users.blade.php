@extends('layouts/templateUser')

@section('content')


<div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body scroll-table">
                    <h4 class="card-title">Users</h4>


                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th> <strong># </strong></th>
                          <th> <strong>Username </strong> </th>
                          <th> <strong>Role</strong> </th>
                          <th> <strong>E-mail</strong> </th>
                          <th> <strong>Registered</strong> </th>
                          <th> <strong>Last active</strong> </th>
                          <th> <strong>Active</strong> </th>
                          <th> <strong>Image</strong> </th>

                        </tr>

                      </thead>
                      <tbody>


                        @foreach($users as $u)
                        @component('components.adminUser', ['u' => $u])
                        @endcomponent
                        @endforeach







                      </tbody>
                    </table>
                    <div class='pagination-links'>
                      {{$users -> links()}}
                    </div>
                  </div>
                </div>
              </div>




@endsection
