@extends('layouts.template')

@section('content')

<!-- content page -->
<div class="bg0 p-t-95 p-b-50">
  <div class="container">
    <div class="row" id='reset-pass-wrapper'>
      <div class="col-md-6 p-b-50">
        <div class="p-r-15 p-rl-0-lg">
          <h4 class="txt-m-124 cl3 p-b-28">
            Reset password
          </h4>

          <form id='reset-pass-form' method='post' onsubmit="return validateResetPass();"  action="{{url('/resetPass')}}" class="how-bor3 p-rl-30 p-tb-32">
            @csrf
            <div class="p-b-24">
              <div class="txt-s-101 cl6 p-b-10">
                E-mail <span class="cl12">*</span>
              </div>

              <input id='email' class="txt-s-120 cl3 size-a-21 bo-all-1 bocl15 p-rl-15 focus1" type="text" name="email">
              <span class='errors-span' id='email-reset-pass-error'>

                @isset($errors)

                @if($errors -> has('email'))
                {{$errors -> first('email')}}

                @endif


                @endisset

              </span>
            </div>

            <div class="p-b-24">
              <div class="txt-s-101 cl6 p-b-10">
              Verify E-mail <span class="cl12">*</span>
              </div>

              <input id='verify_email' class="txt-s-120 cl3 size-a-21 bo-all-1 bocl15 p-rl-15 focus1" type="text" name="verify_email">
              <span class='errors-span' id='email-re-enter-reset-pass-error'>

                @isset($errors)
                  @if($errors -> has('verify_email'))
                    {{$errors -> first('verify_email')}}
                  @endif

                @endisset

                @if(session('message'))
                {{session('message')}}
                @endif



              </span>
            </div>

            


            <div class="flex-w flex-m p-t-15 p-b-10">
              <button id='btn-reset-pass' type='submit' class="flex-c-m txt-s-105 cl0 bg10 size-a-39 hov-btn2 trans-04 p-rl-10 m-r-18">
                Reset
              </button>


            </div>
            <span class='errors-span' id='email-reset-span'>



          </form>
        </div>
      </div>


    </div>
  </div>
</div>

@endsection
