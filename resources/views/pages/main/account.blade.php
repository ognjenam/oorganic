@extends('layouts/template')


@section('content')


<section class="sec-product-detail bg0 p-t-105 p-b-70">
  <div class="container">
    <div class="row">



      <div id='account-wrapper' class="col-md-12 col-lg-12">
        <div id='account' class=" p-l-0-lg">
          <div id="img-user-wrapper">
            <div id="img-wrapper">
              @if($user -> path == null)
              No image

              @else
              <img id='img-user' src="{{asset('main/images/user/' . $user -> path)}}" alt="">
              @endif

            </div>

            <form id='user-account' enctype="multipart/form-data">

              @csrf
              <input data-id='{{$user -> user_ID}}' id='file-img-account' type="file" name="user-img" value="">


            <span id='img-path'>


            </span>

            <button id='upload-img-account' type='button' class="img-addremove-account flex-c-m txt-s-105 cl0 bg10 size-a-39 hov-btn2 trans-04">
              Upload
            </button>
            @if($user -> path != null)
              <div id='delete-img'><a href="{{url('/delete_image')}}">Delete image</a></div>
            @endif



          </div>

          <h4 class="text-center js-name1 txt-l-104 cl3 p-b-16">

            {{$user -> username}}

          </h4>









          <div class="text-center user-info txt-s-107 ">
            <span class="cl6">
              Role:
            </span>
            <span class=" user-value cl10">
              {{$user -> name}}
            </span>

          </div>
          <div class="text-center user-info txt-s-107 ">
            <span class="cl6">
              Date of registration:
            </span>
            <span class=" user-value cl10">
              @if($user -> name == 'admin')
              -
              @else
              {{$user -> registration_date}}
              @endif

            </span>

          </div>
          <div class="text-center user-info txt-s-107 ">
            <span class="cl6">
              E-mail
            </span>
            <span class="user-value cl10">
              {{$user -> email}}
            </span>

          </div>
          <div class="text-center user-info txt-s-107 ">

            <button id='update-account' name='user-btn' type='button' class="flex-c-m txt-s-105 cl0 bg10 size-a-39 hov-btn2 trans-04">
              Update account
            </button>

          </div>
          <span id='resetPass'><a href="{{url('/change_password')}}">Change password?</a></span>

          <a class="" href="{{url('/shopping_cart')}}"><i class="fas fa-shopping-cart"></i></a>

          </form>



        </div>
      </div>
    </div>

</section>

@endsection
