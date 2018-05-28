<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
@extends('layouts.master')
@section('content')
	<div class="mail">
		<div class="row">
		<div class="col-md-8 col-md-offset-2">		
		<div class="container">
			<h3>Profile</h3>
			<div class="agile_mail_grids">
				<div class="col-md-5 contact-left">
					<h4>Information</h4>
					<p>Name: <span>{{$user->name}}</span></p>
					<p>Email: <span>{{$user->email}}</span></p>
					<h2>My Orders</h2>
					@foreach($orders as $order)
						<div class ="panel panle-default">
							<div class="panel-body">
								<ul class="list-group">
									@foreach($order->cart->items as $item)
									<li class="list-group-item">
										<span class="badge">{{$item['price']}}</span>
										{{$item['item']['name']}} | {{$item['qty']}} Units
									</li>
									@endforeach
								</ul>
							</div>
							<div class = "panel-footer">
								<strong>Total Price: {{ $order->cart->totalPrice }}</strong>
							</div>
						</div>
					@endforeach
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
@endsection