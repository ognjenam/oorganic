<div class="of-hidden size-w-2 respon2">
  <div class="categories-counter-wrapper hov-img1 pos-relative">


    <div class="s-full ab-t-l flex-col-c-m  p-all-15 hov1-parent">


      <span class="txt-l-102 cl0 txt-center p-t-30 p-b-13">
      {{$c -> name}}
      </span>

      <div class="hov1 trans-04">
        <div class="txt-m-102 cl0 txt-center hov1-child trans-04">
          @if($c -> productsNumber != 1)
          - {{$c -> productsNumber}} Products -

          @else
            - {{$c -> productsNumber}} Product -
          @endif

        </div>
      </div>
    </div>
  </div>
</div>
