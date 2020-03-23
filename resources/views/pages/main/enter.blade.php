@extends('layouts/template')


@section('content')

<!-- content page -->
<div class="bg0 p-t-95 p-b-50">
  <div class="container">
    <div class="row">
      <div class="col-md-6 p-b-50">
        <div class="p-r-15 p-rl-0-lg">
          <h4 class="txt-m-124 cl3 p-b-28">
            Login
          </h4>

          <form id='login-form' method='post' onsubmit="return validateLogin();"  action="{{url('/login')}}" class="how-bor3 p-rl-30 p-tb-32">
            @csrf
            <div class="p-b-24">
              <div class="txt-s-101 cl6 p-b-10">
                Username <span class="cl12">*</span>
              </div>

              <input id='login-username' class="txt-s-120 cl3 size-a-21 bo-all-1 bocl15 p-rl-15 focus1" type="text" name="login-username">
              <span id='login-username-error'>
                @isset($errors)

                @if ($errors -> has('login-username'))

                {{$errors -> first('login-username')}}

                @else


                @endif





                @endisset

                @if(session('usernameNotExists'))
                {{ session('usernameNotExists') }}
                @endif




              </span>
            </div>

            <div class="p-b-24">
              <div class="txt-s-101 cl6 p-b-10">
                Password <span class="cl12">*</span>
              </div>

              <input id='login-password' class="txt-s-120 cl3 size-a-21 bo-all-1 bocl15 p-rl-15 focus1" type="password" name="login-password">
              <span id='login-password-error' >
                @isset($errors)

                @if ($errors -> has('login-password'))

                {{$errors -> first('login-password')}}

                @else


                @endif





                @endisset

                @if(session('passwordIsNotGood'))
                {{ session('passwordIsNotGood') }}
                @endif

                @if(session('changed_pass'))
                  {{session('changed_pass')}}
                @endif

              </span>



            </div>

            <div class="flex-w flex-m p-t-15 p-b-10">
              <button id='btn-login' type='submit' class="flex-c-m txt-s-105 cl0 bg10 size-a-39 hov-btn2 trans-04 p-rl-10 m-r-18">
                Login
              </button>


            </div>
            <span id='forgotPass'>

              <a href="{{url('/forgot_password')}}">Forgot your password?</a></span>


            <!-- <a href="#" class="txt-s-101 cl9 hov-cl10 trans-04">
              Lost your password?
            </a> -->
          </form>
        </div>
      </div>

      <div class="col-md-6 p-b-50">
        <div class="p-l-15 p-rl-0-lg">
          <h4 class="txt-m-124 cl3 p-b-28">
            Register
          </h4>

          <form id='register-form' method='post' onsubmit="return validateRegister();" action="{{url('/register')}}" class="how-bor3 p-rl-30 p-t-32 p-b-66">
            @csrf
            <div class="p-b-24">
              <div class="txt-s-101 cl6 p-b-10">
                Email address <span class="cl12">*</span>
              </div>

              <input id='register-email' class="txt-s-120 cl3 size-a-21 bo-all-1 bocl15 p-rl-15 focus1" type="text" name="register-email">
              <span id='register-email-error'>

                @if ($errors -> has('register-email'))
                  {{$errors -> first('register-email')}}

                @endif

                @if(session('emailAlreadyExists'))

                {{session('emailAlreadyExists')}}

                @endif

              </span>
            </div>
            <div class="p-b-24">
              <div class="txt-s-101 cl6 p-b-10">
                Username <span class="cl12">*</span>
              </div>

              <input id='register-username' class="txt-s-120 cl3 size-a-21 bo-all-1 bocl15 p-rl-15 focus1" type="text" name="register-username">
              <span id='register-username-error'>

                @if($errors -> has ('register-username'))
                {{$errors -> first('register-username')}}
                @endif

                @if(session('usernameAlreadyExists'))
                {{session('usernameAlreadyExists')}}
                @endif

              </span>
            </div>

            <div class="p-b-24">
              <div class="txt-s-101 cl6 p-b-10">
                Password <span class="cl12">*</span>
              </div>

              <input id='register-password' class="txt-s-120 cl3 size-a-21 bo-all-1 bocl15 p-rl-15 focus1" type="password" name="register-password">
              <span id='register-password-error'>

                @if($errors -> has('register-password'))
                {{$errors -> first('register-password')}}
                @endif

                @if(session('register-password'))
                  {{session('register-password')}}
                @endif

              </span>
            </div>

            <div class="flex-w flex-m p-t-15">
              <button id='btn-register' type='submit' class="flex-c-m txt-s-105 cl0 bg10 size-a-39 hov-btn2 trans-04 p-rl-10 m-r-18">
                Register
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection
