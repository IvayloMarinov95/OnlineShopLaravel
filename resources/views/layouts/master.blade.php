<!doctype html>
<html lang="en">
    <head>
        <meta charset = "UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Electronic Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	        SmartPhone Compatible web template, free web designs for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
	        function hideURLbar(){ window.scrollTo(0,1); } </script>
        <title>@yield('title')</title>
        <link rel = "stylesheet" href = "{{ URL::to('css/main.css')}}">
        <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />
        <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
        <link href="{{ asset('css/fasthover.css') }}" rel="stylesheet" type="text/css" media="all" />
        <link href="{{ asset('css/popuo-box.css') }}" rel="stylesheet" type="text/css" media="all" />
        <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet"> 
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('css/jquery.countdown.css') }}" /> <!-- countdown --> 
        <link href='//fonts.googleapis.com/css?family=Glegoo:400,700' rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $(".scroll").click(function(event){		
                    event.preventDefault();
                    $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
                });
            });
        </script>
        @yield('styles')
    </head>
    <body>
        <script type="text/javascript" src="{{ asset('js/bootstrap-3.1.1.min.js') }}"></script>
        <script src="{{ asset('js/easyResponsiveTabs.js') }}" type="text/javascript"></script>
		<script type="text/javascript">
			$(document).ready(function () {
				$('#horizontalTab').easyResponsiveTabs({
					type: 'default', //Types: default, vertical, accordion           
					width: 'auto', //auto or any width like 600px
					fit: true   // 100% fit in a container
				});
			});
    	</script>
        	<script>
		$('#myModal88').modal('show');
	</script>  
        @include('includes.header')
        <div class = "main">
            @yield('content')
        </div>
        <script type="text/javascript">
			$(window).load(function() {
				$("#flexiselDemo1").flexisel({
					visibleItems: 4,
					animationSpeed: 1000,
					autoPlay: true,
					autoPlaySpeed: 3000,    		
					pauseOnHover: true,
					enableResponsiveBreakpoints: true,
					responsiveBreakpoints: { 
						portrait: { 
							changePoint:480,
							visibleItems: 1
						}, 
						landscape: { 
							changePoint:640,
							visibleItems:2
						},
						tablet: { 
							changePoint:768,
							visibleItems: 3
						}
					}
				});
						
			});
			</script>
			<script type="text/javascript" src="{{ asset('js/jquery.flexisel.js') }}"></script>
        @include('includes.footer')
        <script src="{{ asset('js/minicart.js') }}"></script>
        <script>
            w3ls.render();

            w3ls.cart.on('w3sb_checkout', function (evt) {
                var items, len, i;

                if (this.subtotal() > 0) {
                    items = this.items();

                    for (i = 0, len = items.length; i < len; i++) { 
                    }
                }
            });
        </script>  
    </body>
    @yield('scripts')
</html>