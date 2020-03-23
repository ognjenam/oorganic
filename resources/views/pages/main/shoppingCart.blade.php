@extends('layouts.template')

@section('content')

<!-- content page -->


<div class="bg0 p-t-95 p-b-50">
  <div class="container">
    <div class="row">
      <div class="col-md-12 p-b-50">
        <div class="p-r-15 p-rl-0-lg">
          <h4 class=" cl3 p-b-28">
            {{$user -> username}} shopping cart
          </h4>

          <form id='user-cart-form' method='post'  data-id='{{$user -> user_ID}}' class="how-bor3 p-rl-30 p-tb-32">
            @csrf
            <table class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Product</th>
                  <th>Date</th>
                  <th>Quantity</th>
                  <th>Price</th>
                  <th></th>
                </tr>
              </thead>
              <tbody id='user_cart'>

                  @if($shopping_cart -> isEmpty())

                    <tr>
                      <td  class='text-center' colspan='5'>Your cart is empty!</td>
                    </tr>





                  @else

                    <?php $total_price = 0 ?>
                    @foreach($shopping_cart as $s)
                    @if($s -> user_order_ID == null)
                    @component('components.shoppingCart', ['s' => $s])
                    @endcomponent
                      <?php $total_price += $s -> price ?>
                    @endif



                    @endforeach
                    @if($total_price > 0)

                    <tr>
                      <td  class='text-center' colspan='6'>Total: {{$total_price}} $</td>
                    </tr>

                    <tr>
                      <td  class='text-center' colspan='6'><a class="" href="{{route('checkout')}}">Checkout</a></td>
                    </tr>

                    @else
                    <tr>
                      <td  class='text-center' colspan='5'>Your cart is empty!</td>
                    </tr>
                    @endif

                    @endif



              </tbody>

            </table>










          </form>
        </div>
      </div>


    </div>
  </div>
</div>
@endsection
