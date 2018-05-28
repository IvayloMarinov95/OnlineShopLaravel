<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
@extends('layouts.master')
@section('content')

<div>
	<!-- new-products -->
	<div class="new-products">
		<div class="container">
			<h3>Cart</h3>
			@if(Session::has('cart'))
			@foreach($products as $product)
			@if ($errors->has('error'))
				<div class="alert alert-danger">
				@foreach ($errors->all() as $error)
					{{ $error }}<br>
				@endforeach
				</div>
			@endif
			<div class="agileinfo_new_products_grids">
				<div class="col-md-3 agileinfo_new_products_grid">
					<div class="agile_ecommerce_tab_left agileinfo_new_products_grid1">
						<div class="hs-wrapper hs-wrapper1">
							<img src="images/25.jpg" alt=" " class="img-responsive" />
							<img src="images/23.jpg" alt=" " class="img-responsive" />
							<img src="images/24.jpg" alt=" " class="img-responsive" />
							<img src="images/22.jpg" alt=" " class="img-responsive" />
							<img src="images/26.jpg" alt=" " class="img-responsive" /> 
							<div class="w3_hs_bottom w3_hs_bottom_sub">
								<ul>
									<li>
										<a href="#" data-toggle="modal" data-target="#myModal2"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
									</li>
								</ul>
							</div>
						</div>
						<h5>{{$product['item']['name']}}</h5>
						<div class="simpleCart_shelfItem">
							<p><i class="item_price">{{$product['price']}}</i></p>
							<div class="color-quality">
								<h5>Quantity :</h5>
								<div class="cart_quantity_button">
								<form action="{{ route('shop.addToCart', ['id'=> $product['item']['id']]) }}" method="post">
									@csrf
									<button type="submit" class="w3ls-cart"> + </button>
								</form>
									<input class="cart_quantity_input" type="text" name="quantity" value="{{$product['qty']}}" autocomplete="off" size="2">
								<form action="{{ route('shop.reduceQuantity', ['id' => $product['item']['id']]) }}" method="post">
								@csrf
									<button type="submit" class="w3ls-cart"> - </button>	
								</form>
								</div>
							<form action="{{ route('shop.deleteFromCart', ['id' => $product['item']['id']]) }}" method="post">
							@csrf
								<input type="hidden" name="cmd" value="_cart">
								<input type="hidden" name="add" value="1"> 
								{{--<input type="hidden" name="w3ls_item" value="{{$product->name}}"> 
								<input type="hidden" name="amount" value="{{$product->price}}">   --}}
								<button type="submit" class="w3ls-cart">Delete from cart</button>
							</form>
						</div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
			@endforeach
			<div class = "row">
				<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
					<strong>Total: {{ $totalPrice }}</strong>
				</div>
			</div>
			<div class = "row">
				<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
					<a href="{{route('shop.checkout')}}" type="button" class = "btn btn-success">Checkout</a>
				</div>
			</div>
			<div class = "row">
				<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
					<form action="{{ route('shop.flushCart') }}" method = "post">
						@csrf
						<button type="submit" class = "btn btn-success">Clear Cart</button>
					</form>
				</div>
			</div>
			@else
			<div class = "row">
				<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
					<h2>No Items in Cart!</h2>
				</div>
			</div>
			@endif
		</div>
	</div>
	<!-- //new-products -->
</div>
@endsection