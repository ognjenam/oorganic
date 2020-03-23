@extends('layouts/template')

@section('content')

<!-- Welcome -->
<section class="sec-welcome bg0 p-t-145 p-b-95">
  <div class="container">
    <div class="size-a-1 flex-col-c-m p-b-90">
      <div class="txt-center txt-m-201 cl10 how-pos1-parent m-b-14">
        Green Agriculture

        <div class="how-pos1">
          <img src="{{asset('main/images/oorganic_logo.png')}}" alt="IMG">
        </div>
      </div>

      <h3 class="txt-center txt-l-101 cl3 respon1">
        welcome to O' organic
      </h3>
    </div>

    <div class="wrap-pic-max-w flex-c-t flex-w p-t-255 item-welcome-parent">
      <img class="size-w-1" src="{{asset('main/images/banana-01.png')}}" alt="IMG">

      <!-- item welcome -->
      <div class="item-welcome one">
        <div class="item-welcome-pic pos-relative">
          <div class="wrap-pic-max-w flex-c-m item-welcome-pic-dark trans-04">
            <img src="{{asset('main/images/icons/icon1.png')}}" alt="IMG">
          </div>

          <div class="wrap-pic-max-w flex-c-m s-full ab-t-l item-welcome-pic-light trans-04">
            <img src="{{asset('main/images/icons/icon1.1.png')}}" alt="IMG">
          </div>
        </div>

        <div class="item-welcome-txt p-t-27">
          <h4 class="txt-m-101 cl3 txt-center p-b-11">
            100% Organic
          </h4>

          <p class="txt-s-101 cl6 txt-center">
            We want to make it easy to find the good stuff. We want everyone to be able to choose products that have less environmental impact.
          </p>
        </div>
      </div>

      <!-- item welcome -->
      <div class="item-welcome two">
        <div class="item-welcome-pic pos-relative">
          <div class="wrap-pic-max-w flex-c-m item-welcome-pic-dark trans-04">
            <img src="{{asset('main/images/icons/icon2.png')}}" alt="IMG">
          </div>

          <div class="wrap-pic-max-w flex-c-m s-full ab-t-l item-welcome-pic-light trans-04">
            <img src="{{asset('main/images/icons/icon2.2.png')}}" alt="IMG">
          </div>
        </div>

        <div class="item-welcome-txt p-t-27">
          <h4 class="txt-m-101 cl3 txt-center p-b-11">
            family healthy
          </h4>

          <p class="txt-s-101 cl6 txt-center">
            Our O' organic team has innovated the perfect unique suh-weetner blend that not only has less sugar, but delivers a delicious taste!
          </p>
        </div>
      </div>

      <!-- item welcome -->
      <div class="item-welcome three">
        <div class="item-welcome-pic pos-relative">
          <div class="wrap-pic-max-w flex-c-m item-welcome-pic-dark trans-04">
            <img src="{{asset('main/images/icons/icon3.png')}}" alt="IMG">
          </div>

          <div class="wrap-pic-max-w flex-c-m s-full ab-t-l item-welcome-pic-light trans-04">
            <img src="{{asset('main/images/icons/icon3.3.png')}}" alt="IMG">
          </div>
        </div>

        <div class="item-welcome-txt p-t-27">
          <h4 class="txt-m-101 cl3 txt-center p-b-11">
            Always Fresh
          </h4>

          <p class="txt-s-101 cl6 txt-center">
            Our ingredients for success combine a great outlook, fresh ingredients, mixed with a variety of talented employees.
          </p>
        </div>
      </div>

      <!-- item welcome -->
      <div class="item-welcome four">
        <div class="item-welcome-pic pos-relative">
          <div class="wrap-pic-max-w flex-c-m item-welcome-pic-dark trans-04">
            <img src="{{asset('main/images/icons/icon4.png')}}" alt="IMG">
          </div>

          <div class="wrap-pic-max-w flex-c-m s-full ab-t-l item-welcome-pic-light trans-04">
            <img src="{{asset('main/images/icons/icon4.4.png')}}" alt="IMG">
          </div>
        </div>

        <div class="item-welcome-txt p-t-27">
          <h4 class="txt-m-101 cl3 txt-center p-b-11">
            Food safety
          </h4>

          <p class="txt-s-101 cl6 txt-center">
            Our passion is for our planet. We believe it should be easy to live well and care for the environment and the natural world. Why not?
          </p>
        </div>
      </div>

    </div>
  </div>
</section>



	<!-- Category -->
	<div class="sec-item flex-w">
    @foreach($categories as $c)
    @component ('components.category', ['c' => $c])
    @endcomponent
    @endforeach



	</div>

@endsection
