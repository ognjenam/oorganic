@extends('layouts/template')


@section('content')
<!-- Form Contact -->

<section class="container bg0 p-t-150 p-b-90">
  <div class="row">
    <div class="col-sm-10 col-md-6 col-lg-5 m-rl-auto p-b-10">
      <div class="h-full how5 m-r--30 m-r-0-lg m-l-15-xl">
        <div class="bg-img3 h-full respon18" style="background-image: url({{asset('main/images/banana-02.png')}});"></div>
      </div>
    </div>

    <div class="col-sm-10 col-md-6 col-lg-7 m-rl-auto p-b-10">
      <div class="p-t-75 p-l-70 p-rl-0-lg">
        <div class="size-a-1 flex-col-l p-b-70">
          <div class="txt-m-201 cl10 how-pos1-parent m-b-14">
            Get In Touch

            <div class="how-pos1">
              <img src="{{asset('main/images/oorganic_logo.png')}}" alt="IMG">
            </div>
          </div>

          <h3 class="txt-l-101 cl3 respon1">
            Leave us a message!
          </h3>
        </div>

        <form id="contact-form"  method='post' class="validate-form" name="contact-form">
          @csrf
          <div class="row">
            <div class="col-lg-6 p-b-20">
              <div class="m-r--5 m-rl-0-lg" >
                <input id='full-name-contact' class="txt-s-115 cl3 plh1 size-a-25 bo-all-1 bocl15 focus1 p-rl-20" type="text" name="name" placeholder="Your Full Name *">
                <span class='errors-span' id='name-contact-error'></span>
              </div>
            </div>

            <div class="col-lg-6 p-b-20">
              <div class="m-l--5 m-rl-0-lg ">
                <input id='email-contact' class="txt-s-115 cl3 plh1 size-a-25 bo-all-1 bocl15 focus1 p-rl-20" type="text" name="email" placeholder="Your Email *">
                <span class='errors-span' id='email-contact-error'></span>
              </div>
            </div>









            <div class="col-12 p-b-20">
              <div class="validate-input" >
                <textarea id='message-contact' class="txt-s-115 cl3 plh1 size-a-48 bo-all-1 bocl15 focus1 p-rl-20 p-tb-10" name="msg" placeholder="Your Message"></textarea>
                <span class='errors-span' id='message-contact-error'></span>
              </div>
            </div>
          </div>

          <div class="flex-l p-t-10">
            <button id='btn-contact' type='button' class="flex-c-m txt-s-103 cl0 bg10 size-a-2 hov-btn2 trans-04">
              Send
            </button>

          </div>
          <span class='errors-span' id='send-contact-message-error'></span>

        </form>
      </div>
    </div>
  </div>
</section>

@endsection
