@extends('layouts.templateUser')


@section('content')
<div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body scroll-table">
                    <h4 class="card-title">User Activity Log</h4>


                    <table id='log_info_table' class="table table-striped">
                      <thead>
                        <tr>

                          <th> <strong>User </strong> </th>
                          <th> <strong>URL</strong> </th>
                          <th> <strong>Date</strong> </th>
                          <th> <strong>IP address</strong> </th>

                        </tr>

                      </thead>
                      <tbody>

                        <?php
                        $file = explode('\n', $log_file);

                        for($i = 0; $i < count($file) - 1; $i++)
                        {
                          $splited = explode('\t', $file[$i]);

                          ?>
                            @component('components.adminLog', ['splited' => $splited])

                            @endcomponent

                          <?php
                        }



                        ?>


                      </tbody>
                    </table>

                  </div>
                </div>
              </div>

@endsection
