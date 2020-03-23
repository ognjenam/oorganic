@extends('layouts.template')

@section('content')

<!-- content page -->
<div class="bg0 p-t-95 p-b-50">
  <div class="container">
    <div class="row" id='reset-pass-wrapper'>
      <div class="col-md-6 p-b-50">
        <div class="p-r-15 p-rl-0-lg">
          <h4 class="txt-m-124 cl3 p-b-28">
            Change password
          </h4>

          <form id='change-pass-form' method='post' onsubmit="return validateChangePass();"  action="{{url('/changePass')}}" class="how-bor3 p-rl-30 p-tb-32">
            @csrf
            <div class="p-b-24">
              <div class="txt-s-101 cl6 p-b-10">
                New Password <span class="cl12">*</span>
              </div>

              <input id='new_password' class="txt-s-120 cl3 size-a-21 bo-all-1 bocl15 p-rl-15 focus1" type="password" name="new_password">
              <span class='errors-span' id='new_password_error'>

                @isset($errors)
                  @if($errors -> has('new_password'))
                    {{$errors -> first('new_password')}}

                  @endif
                @endisset



              </span>
            </div>

            <div class="p-b-24">
              <div class="txt-s-101 cl6 p-b-10">
                Verify New Password <span class="cl12">*</span>
              </div>

              <input id='new_password_verify' class="txt-s-120 cl3 size-a-21 bo-all-1 bocl15 p-rl-15 focus1" type="password" name="new_password_verify">
              <span class='errors-span' id='new_password_error_verify'>

                @isset($errors)
                  @if($errors -> has('new_password_verify'))

                  {{$errors -> first('new_password_verify')}}


                  @endif

                @endisset



              </span>
            </div>





            <div class="flex-w flex-m p-t-15 p-b-10">
              <button id='btn-change-pass' type='submit' class="flex-c-m txt-s-105 cl0 bg10 size-a-39 hov-btn2 trans-04 p-rl-10 m-r-18">
                Change
              </button>


            </div>
            <span class='errors-span' id='password-change-span'>


              @if(session('message'))
              {{session('message')}}
              @endif


          </form>
        </div>
      </div>


    </div>
  </div>
</div>
@endsection('content')
