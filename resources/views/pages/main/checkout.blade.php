@extends('layouts.template')

@section('content')
<section class="container bg0  p-b-90">
  <div class="row">
    

    <div class="col-sm-12 col-md-12 col-lg-12 m-rl-auto p-b-10">
      <div class="p-t-75 p-l-70 p-rl-0-lg">
        <div class="size-a-1 flex-col-l p-b-70">
          <div class="txt-m-201 cl10 how-pos1-parent m-b-14">
            Checkout

            <div class="how-pos1">
              <img src="{{asset('main/images/oorganic_logo.png')}}" alt="IMG">
            </div>
          </div>


        </div>

        <form id="checkout-form"  method='post' class="validate-form" name="checkout-form">
          @csrf
          <div class="row">
            <div class="col-lg-6 p-b-20">
              <div class="m-r--5 m-rl-0-lg" >
                <input data-id='{{session() -> get("user") -> user_ID}}' id='full-name-checkout' class="txt-s-115 cl3 plh1 size-a-25 bo-all-1 bocl15 focus1 p-rl-20" type="text" name="full-name-checkout" placeholder="Your Full Name *">
                <span class='errors-span' id='full-name-checkout-error'></span>
              </div>
            </div>

            <div class="col-lg-6 p-b-20">
              <div class="m-l--5 m-rl-0-lg ">
                <input id='address-checkout' class="txt-s-115 cl3 plh1 size-a-25 bo-all-1 bocl15 focus1 p-rl-20" type="text" name="address-checkout" placeholder="Your Address *">
                <span class='errors-span' id='address-checkout-error'></span>
              </div>
            </div>


          </div>
          <div class="row">
            <div class="col-lg-6 p-b-20">
              <div class="m-r--5 m-rl-0-lg" >
                <input id='phone-checkout' class="txt-s-115 cl3 plh1 size-a-25 bo-all-1 bocl15 focus1 p-rl-20" type="text" name="phone-checkout" placeholder="+1">
                <span class='errors-span' id='phone-checkout-error'></span>
              </div>
            </div>




          </div>

          <div class="flex-l p-t-10">
            <button id='btn-checkout' type='button' class="flex-c-m txt-s-103 cl0 bg10 size-a-2 hov-btn2 trans-04">
              Buy
            </button>

          </div>
          <span class='errors-span' id='checkout-error'></span>

        </form>
      </div>
    </div>
  </div>
</section>

@endsection
