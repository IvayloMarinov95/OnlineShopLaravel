<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
@extends('layouts.master')
@section('content')
    @if(Session::has('cart'))
    <div class="agileinfo_new_products_grids">
        <div class = "row">
            @foreach($products as $product)
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
						<h5><a href="{{route('shop.single', ['product_id' => $product['item']['id']])}}">{{ $product['item']['name'] }}</a></h5>
						<div class="simpleCart_shelfItem">
                            <p><i class="item_price">{{ $product['qty'] }}</i></p>
							<p><i class="item_price">{{$product['price']}}</i></p> 
                        </div>
					</div>
				</div>
                @endforeach
            </div>
            <div class="clearfix"> </div>
            <div class= "add-left-space">
                <h1>Checkout</h1>
                <h4>Your Total: ${{ $total }}</h4>
            </div>
            
    @endif
            <form action="{{ route('shop.order') }}" method="post" class="add-left-space">
            @csrf
                <div class="row">
                    <div class = "col-xs-4">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id = "name" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class = "col-xs-4">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" id = "address" class="form-control">
                        </div>
                    </div>
                </div>
                </div>
                <div class="add-left-space">
                <button type="submit" class="btn btn-success">Buy</button>
                </div>
            </form>
        </div>
    </div>
@endsection