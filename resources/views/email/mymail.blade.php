<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
    <h1>Your order has been shipped!</h1>
    <div class="agileinfo_new_products_grids">
        <div class = "row">
        @foreach(unserialize($order->cart)->items as $product)
                <div class="col-md-3 agileinfo_new_products_grid">
                        <div class="agile_ecommerce_tab_left agileinfo_new_products_grid1">
                            <div class="hs-wrapper hs-wrapper1">
                                <img src="{{asset('images/25.jpg')}}" alt=" " class="img-responsive" />
                            </div>
                            <h5>Product Name: {{ $product['item']['name'] }}</h5>
                            <div class="simpleCart_shelfItem">
                                <p><i class="item_price">Quantity: {{ $product['qty'] }}</i></p>
                                <p><i class="item_price">Price: {{$product['price']}}</i></p> 
                            </div>
                        </div>
                    </div>
             @endforeach
            </div>
            </div>
            <div class="clearfix"> </div>
            
</body>
</html>