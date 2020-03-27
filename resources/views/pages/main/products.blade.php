@extends('layouts/template')


@section('content')

	<!-- Product -->
	<div class="sec-product bg0 p-t-145 p-b-25">
		<div class="container">
			<div class="size-a-1 flex-col-c-m p-b-48">


				<h3 class="txt-center txt-l-101 cl3 respon1">
					Our products
				</h3>
			</div>

			<div class="p-b-46">
				<div class="flex-w flex-c-m filter-tope-group">
					<button data-id='0' class="category-filter txt-m-104 cl9 hov2 trans-04 p-rl-27 p-b-10">
						All Products
					</button>

					@foreach($categories as $c)
					@component('components.categoryFilter', ['c' => $c])
					@endcomponent
					@endforeach




				</div>
			</div>
<form >
			<div id='ajaxProductsByCategory' class="row isotope-grid">

					@csrf
					@foreach($products as $p)
						@component('components.product', ['p' => $p])
						@endcomponent

					@endforeach

			</div>
			<!-- <div id="txt_inform">

			</div> -->
			</form>
		</div>
	</div>

@endsection
