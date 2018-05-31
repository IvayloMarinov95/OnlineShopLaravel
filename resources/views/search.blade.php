@extends('layouts.master')
@section('content')
@if (Session::has('success'))
   <div class="alert alert-info">{{ Session::get('success') }}</div>
@endif
<div>
	<!-- new-products -->
	<div class="new-products">
		<div class="container">
			<h3>All Products</h3>
            <form action="{{route('searchresult')}}" method="get">
                <input type="text" name="searchData" placeholder="Search">
                <label for="category">Category:</label>
                <select name="category" id="category">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{$category->name }}</option>
                    @endforeach
                </select>
                <a href="{{route('searchresult')}}">
                <input type="submit" value = "Search">
                </form>
			<div class="agileinfo_new_products_grids">
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
						<h5><a href="{{route('shop.single', ['product_id' => $product->id])}}">{{$product->name}}</a></h5>
						<div class="simpleCart_shelfItem">
							<p><i class="item_price">{{$product->price}}</i></p>
							<form action="{{ route('shop.addToCart', ['id'=> $product->id]) }}" method="post">
							@csrf
								<input type="hidden" name="cmd" value="_cart">
								<input type="hidden" name="add" value="1"> 
								<input type="hidden" name="w3ls_item" value="{{$product->name}}"> 
								<input type="hidden" name="amount" value="{{$product->price}}">   
								<button type="submit" class="w3ls-cart">Add to cart</button>
							</form>
						</div>
					</div>
				</div>
				@endforeach
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	
	<!-- //new-products -->
	<!-- top-brands -->
	<div class="top-brands">
		<div class="container">
			<h3>Top Brands</h3>
			<div class="sliderfig">
				<ul id="flexiselDemo1">			
					<li>
						<img src="images/tb1.jpg" alt=" " class="img-responsive" />
					</li>
					<li>
						<img src="images/tb2.jpg" alt=" " class="img-responsive" />
					</li>
					<li>
						<img src="images/tb3.jpg" alt=" " class="img-responsive" />
					</li>
					<li>
						<img src="images/tb4.jpg" alt=" " class="img-responsive" />
					</li>
					<li>
						<img src="images/tb5.jpg" alt=" " class="img-responsive" />
					</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //top-brands --> 
</div>
@endsection