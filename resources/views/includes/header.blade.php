<header>

<div class="modal fade" id="myModal88" tabindex="-1" role="dialog" aria-labelledby="myModal88"aria-hidden="true">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
									&times;</button>
								<h4 class="modal-title" id="myModalLabel">Don't Wait, Login now!</h4>
							</div>
							@if (session('status'))
								<div class="alert alert-success">
									{{ session('status') }}
								</div>
							@endif
							@if (session('warning'))
								<div class="alert alert-warning">
									{{ session('warning') }}
								</div>
							@endif
							<div class="modal-body modal-body-sub">
								<div class="row">
									<div class="col-md-8 modal_body_left modal_body_left1" style="border-right: 1px dotted #C2C2C2;padding-right:3em;">
										<div class="sap_tabs">	
											<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
												<ul>
													<li class="resp-tab-item" aria-controls="tab_item-0"><span>Sign in</span></li>
													<li class="resp-tab-item" aria-controls="tab_item-1"><span>Sign up</span></li>
												</ul>		
												<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
													<div class="facts">
														<div class="register">
															<form action="{{ route('login') }}" method="post">
																@csrf			
																<input name="email" placeholder="Email Address" type="text" {{ $errors->has('email') ? 'class=has-error' : '' }} value="{{ Request::old('email') }}">						
																<input name="password" placeholder="Password" type="password" required="">										
																<div class="sign-up">
																	<input type="submit" value="Sign in"/>
																</div>
															</form>
														</div>
													</div> 
												</div>	 
												<div class="tab-2 resp-tab-content" aria-labelledby="tab_item-1">
													<div class="facts">
														<div class="register">
															<form action="{{route('register')}}" method="post">
																@csrf			
																<input placeholder="Name" name="name" type="text" {{ $errors->has('name') ? 'class=has-error' : '' }} value="{{ Request::old('name') }}">
																<input placeholder="Email Address" name="email" type="email" {{ $errors->has('email') ? 'class=has-error' : '' }} value="{{ Request::old('email') }}">	
																<input placeholder="Password" name="password" type="password" >	
																<input placeholder="Confirm Password" name="password_confirmation" type="password">
																<div class="sign-up">
																	<input type="submit" value="Create Account"/>
																</div>
															</form>
														</div>
													</div>
												</div> 			        					            	      
											</div>	
										</div>
										<div id="OR" class="hidden-xs">OR</div>
									</div>
									<div class="col-md-4 modal_body_right modal_body_right1">
										<div class="row text-center sign-with">
											<div class="col-md-12">
												<h3 class="other-nw">Sign in with</h3>
											</div>
											<div class="col-md-12">
												<ul class="social">
													<li class="social_facebook"><a href="#" class="entypo-facebook"></a></li>
													<li class="social_dribbble"><a href="#" class="entypo-dribbble"></a></li>
													<li class="social_twitter"><a href="#" class="entypo-twitter"></a></li>
													<li class="social_behance"><a href="#" class="entypo-behance"></a></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

<div class="header" id="home1">
		<div class="container">
		<div class="w3l_login">
			@auth
				<a href="#" data-toggle="modal" data-target="#myModal88"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a>{{Auth::user()->name}}
				<a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
			@else
			<a href="#" data-toggle="modal" data-target="#myModal88"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a>
			@endauth
			</div>
			<div class="w3l_logo">
				<h1><a href="index.html">Electronic Store<span>Your stores. Your place.</span></a></h1>
			</div>
			
			<a href="{{route('shop.search')}}">
			<div class="search">
				<input class="search_box" type="checkbox" id="search_box">
				<label class="icon-search" for="search_box"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></label>
			</div>
			</a>
			<div class="cart cart box_1"> 
				<form action="#" method="post" class="last"> 
					<input type="hidden" name="cmd" value="_cart" />
					<input type="hidden" name="display" value="1" />
					{{--{{dd(Session::get('cart'))}}--}}
					<button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
					<a href="{{ route('shop.cart') }}"><p>Show Cart</p><span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span></a>
				</form>   
			</div>  
		</div>
	</div>
	<!-- //header -->
	<!-- navigation -->
	<div class="navigation">
		<div class="container">
			<nav class="navbar navbar-default">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header nav_2">
					<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div> 
				<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
					<ul class="nav navbar-nav">
						<li><a href="{{ route('shop.index') }}" class="act">Home</a></li>	
						<!-- Mega Menu -->
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Products <b class="caret"></b></a>
							<ul class="dropdown-menu multi-column columns-3">
								<div class="row">
								@foreach($categories as $category)
									<div class="col-sm-3">
										<ul class="multi-column-dropdown">
											<h6><a href="{{ route('shop.products', ['category_id' => $category->id]) }}">{{$category->name}}</a></h6>
											@foreach($category->products as $product)
											<li><a href="{{ route('shop.single', ['product_id' => $product->id]) }}">{{$product->name}}</a></li>
											@endforeach
										</ul>
									</div>
									@endforeach
									<div class="clearfix"></div>
								</div>
							</ul>
						</li>
						<li><a href="{{ route('shop.about') }}">About Us</a></li> 
						@auth
						<li><a href="{{ route('shop.profile', ['user_id' => Auth::user()->id]) }}">Profile</a></li>
						@endauth
					</ul>
				</div>
			</nav>
		</div>
	</div>
	<!-- //navigation -->
	<!-- banner -->
	<div class="banner">
		<div class="container">
			<h3>Electronic Store, <span>Special Offers</span></h3>
		</div>
	</div>
</header>