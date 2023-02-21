@extends("./templates/main")

@section("main")
    <main class="main">
            <div class="intro-slider-container mb-5">
                <div class="intro-slider owl-carousel owl-theme owl-nav-inside owl-light" data-toggle="owl" 
                    data-owl-options='{
                        "dots": true,
                        "nav": false, 
                        "responsive": {
                            "1200": {
                                "nav": true,
                                "dots": false
                            }
                        }
                    }'>
                    <div class="intro-slide" style="background-image: url({{asset('frontend/assets/images/demos/demo-4/slider/slide-1.png')}});">
                        <div class="container intro-content">
                            <div class="row justify-content-end">
                                <div class="col-auto col-sm-7 col-md-6 col-lg-5">
                                    <h3 class="intro-subtitle text-third">Deals and Promotions</h3><!-- End .h3 intro-subtitle -->
                                    <h1 class="intro-title">Beats by</h1>
                                    <h1 class="intro-title">Dre Studio 3</h1><!-- End .intro-title -->

                                    <div class="intro-price">
                                        <sup class="intro-old-price">$349,95</sup>
                                        <span class="text-third">
                                            $279<sup>.99</sup>
                                        </span>
                                    </div><!-- End .intro-price -->

                                    <a href="category.html" class="btn btn-primary btn-round">
                                        <span>Shop More</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </a>
                                </div><!-- End .col-lg-11 offset-lg-1 -->
                            </div><!-- End .row -->
                        </div><!-- End .intro-content -->
                    </div><!-- End .intro-slide -->

                    <div class="intro-slide" style="background-image: url({{asset('frontend/assets/images/demos/demo-4/slider/slide-2.png')}});">
                        <div class="container intro-content">
                            <div class="row justify-content-end">
                                <div class="col-auto col-sm-7 col-md-6 col-lg-5">
                                    <h3 class="intro-subtitle text-primary">New Arrival</h3><!-- End .h3 intro-subtitle -->
                                    <h1 class="intro-title">Apple iPad Pro <br>12.9 Inch, 64GB </h1><!-- End .intro-title -->

                                    <div class="intro-price">
                                        <sup>Today:</sup>
                                        <span class="text-primary">
                                            $999<sup>.99</sup>
                                        </span>
                                    </div><!-- End .intro-price -->

                                    <a href="category.html" class="btn btn-primary btn-round">
                                        <span>Shop More</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </a>
                                </div><!-- End .col-md-6 offset-md-6 -->
                            </div><!-- End .row -->
                        </div><!-- End .intro-content -->
                    </div><!-- End .intro-slide -->
                </div><!-- End .intro-slider owl-carousel owl-simple -->

                <span class="slider-loader"></span><!-- End .slider-loader -->
            </div><!-- End .intro-slider-container -->

            <div class="container">
                <h2 class="title text-center mb-4">Thương hiệu nổi bật</h2><!-- End .title text-center -->
                
                <div class="cat-blocks-container">
                    <div class="row">

                    @if(isset($cate))
                        @foreach($cate as $key)
                            <div class="col-6 col-sm-4 col-lg-2">
                                <a href="/phone/{{$key->slug}}" class="cat-block">
                                    <figure>
                                        <span>
                                            <img src="{{asset('images/' . $key->image)}}" style="height: 200px;" alt="">
                                        </span>
                                    </figure>

                                    <h3 class="cat-block-title">{{$key->category_name}}</h3><!-- End .cat-block-title -->
                                </a>
                            </div><!-- End .col-sm-4 col-lg-2 -->
                        @endforeach
                    @endif
                    </div><!-- End .row -->
                </div><!-- End .cat-blocks-container -->
            </div><!-- End .container -->

            <div class="mb-4"></div><!-- End .mb-4 -->


            <div class="mb-3"></div><!-- End .mb-5 -->

            

            <div class="mb-6"></div><!-- End .mb-6 -->

           

            


            <div class="bg-light pt-5 pb-6">
                <div class="container trending-products">
                    <div class="heading heading-flex mb-3">
                        <div class="heading-left">
                            <h2 class="title">Các sản phẩm mới </h2><!-- End .title -->
                        </div><!-- End .heading-left -->
                    </div><!-- End .heading -->

                    <div class="row">
                        <div class="col-xl-5col d-none d-xl-block">
                            <div class="banner">
                                <a href="#">
                                    <img src="{{asset('frontend/assets/images/demos/demo-4/banners/banner-4.jpg')}}" alt="banner">
                                </a>
                            </div><!-- End .banner -->
                        </div><!-- End .col-xl-5col -->

                        <div class="col-xl-4-5col">
                            <div class="tab-content tab-content-carousel just-action-icons-sm">
                                <div class="tab-pane p-0 fade show active" id="trending-top-tab" role="tabpanel" aria-labelledby="trending-top-link">
                                    <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                                        data-owl-options='{
                                            "nav": true, 
                                            "dots": false,
                                            "margin": 20,
                                            "loop": false,
                                            "responsive": {
                                                "0": {
                                                    "items":2
                                                },
                                                "480": {
                                                    "items":2
                                                },
                                                "768": {
                                                    "items":3
                                                },
                                                "992": {
                                                    "items":4
                                                }
                                            }
                                        }'>
                                        
                                        @if(isset($product_new))
                                            @foreach($product_new as $key)
                                                @php
                                                    $img = DB::table("images")->select("link")->where("product_id", $key->id)->get()[0]->link;
                                                @endphp

                                                <div class="product product-2">
                                                    <figure class="product-media">
                                                        <span class="product-label label-circle label-top">New</span>
                                                        <a href="/phone/{{$key->slug}}">
                                                            <img src="{{asset('images/' .$img )}}" alt="Product image" class="product-image">
                                                        </a>
                                                        <form action="/cart" method="post" class="product-action" onsubmit="return check()">
                                                                @csrf
                                                                <input type="hidden" value="{{$key->id}}" name="product_id">
                                                            
                                                            <button type="submit" class="btn-product btn-cart" title="Add to cart" style="border: none;"><span>Thêm vào giỏ hàng</span></button>
                                                            <a href="/quickView/{{$key->id}}" class="btn-product btn-quickview" title="Quick view"><span>Xem nhanh</span></a>
                                                        </form><!-- End .product-action -->
                                                    </figure><!-- End .product-media -->

                                                    <div class="product-body">
                                                        <h3 class="product-title"><a href="/phone/{{$key->slug}}">{{$key->name}}</a></h3><!-- End .product-title -->
                                                        <div class="product-price">
                                                            {{number_format($key->sale_price)}}
                                                        </div><!-- End .product-price -->
                                                        <div class="ratings-container">
                                                            <div class="ratings">
                                                                <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                                                            </div><!-- End .ratings -->
                                                            <span class="ratings-text">( 4 Reviews )</span>
                                                        </div><!-- End .rating-container -->
                                                    </div><!-- End .product-body -->
                                                </div><!-- End .product -->
                                            @endforeach
                                        @endif
                                    </div><!-- End .owl-carousel -->
                                </div><!-- .End .tab-pane -->
                            </div><!-- End .tab-content -->
                        </div><!-- End .col-xl-4-5col -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .bg-light pt-5 pb-6 -->

            <div class="mb-5"></div><!-- End .mb-5 -->

            <div class="container for-you">
                <div class="heading heading-flex mb-3">
                    <div class="heading-left">
                        <h2 class="title">Các sản phẩm có trong cửa hàng</h2><!-- End .title -->
                    </div><!-- End .heading-left -->

                   <div class="heading-right">
                        <a href="#" class="title-link">Xem nhiều hơn <i class="icon-long-arrow-right"></i></a>
                   </div><!-- End .heading-right -->
                </div><!-- End .heading -->

                <div class="products">
                    <div class="row justify-content-center">
                        @if(isset($product_new))
                            @foreach($product_new as $key)
                            @php
                                $img = DB::table("images")->select("link")->where("product_id", $key->id)->get()[0]->link;
                            @endphp
                                <div class="col-6 col-md-4 col-lg-3">
                                    <div class="product product-2">
                                        <figure class="product-media">
                                            <span class="product-label label-circle label-sale">Sale</span>
                                            <a href="/phone/{{$key->slug}}">
                                                <img src="{{asset('images/' .$img)}}" alt="Product image" class="product-image">
                                            </a>
                                            <div class="product-action">
                                                <form action="/cart" method="post" onsubmit="return check()">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{$key->id}}">
                                                    <button type="submit" class="btn-product btn-cart" title="Add to cart" style="border: none;"><span>Thêm vào giỏ hàng</span></button>
                                                </form>
                                                <a href="/quickView/{{$key->id}}" class="btn-product btn-quickview" title="Quick view"><span>Xem nhanh</span></a>
                                                <script>
                                                    
                                                    
                                                </script>
                                            </div><!-- End .product-action -->
                                            
                                        </figure><!-- End .product-media -->

                                        <div class="product-body">
                                            <div class="product-cat">
                                                <a href="#">Headphones</a>
                                            </div><!-- End .product-cat -->
                                            <h3 class="product-title"><a href="/phone/{{$key->slug}}">{{$key->name}}</a></h3><!-- End .product-title -->
                                            <div class="product-price">
                                                <span class="new-price">{{number_format($key->sale_price)}}</span>
                                                <span class="old-price">{{number_format($key->price)}}</span>
                                            </div><!-- End .product-price -->
                                            <div class="ratings-container">
                                                <div class="ratings">
                                                    <div class="ratings-val" style="width: 40%;"></div><!-- End .ratings-val -->
                                                </div><!-- End .ratings -->
                                                <span class="ratings-text">( 4 Reviews )</span>
                                            </div><!-- End .rating-container -->

                                            
                                        </div><!-- End .product-body -->
                                    </div><!-- End .product -->
                                </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                            @endforeach
                        @endif
                        
                    </div><!-- End .row -->
                </div><!-- End .products -->
            </div><!-- End .container -->

            <div class="mb-4"></div><!-- End .mb-4 -->

            <div class="container">
                <hr class="mb-0">
            </div><!-- End .container -->

            <div class="icon-boxes-container bg-transparent">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-lg-3">
                            <div class="icon-box icon-box-side">
                                <span class="icon-box-icon text-dark">
                                    <i class="icon-rocket"></i>
                                </span>
                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">Free Shipping</h3><!-- End .icon-box-title -->
                                    <p>Orders $50 or more</p>
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="icon-box icon-box-side">
                                <span class="icon-box-icon text-dark">
                                    <i class="icon-rotate-left"></i>
                                </span>

                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">Free Returns</h3><!-- End .icon-box-title -->
                                    <p>Within 30 days</p>
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="icon-box icon-box-side">
                                <span class="icon-box-icon text-dark">
                                    <i class="icon-info-circle"></i>
                                </span>

                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">Get 20% Off 1 Item</h3><!-- End .icon-box-title -->
                                    <p>when you sign up</p>
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="icon-box icon-box-side">
                                <span class="icon-box-icon text-dark">
                                    <i class="icon-life-ring"></i>
                                </span>

                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">We Support</h3><!-- End .icon-box-title -->
                                    <p>24/7 amazing services</p>
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-sm-6 col-lg-3 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .icon-boxes-container -->
        </main><!-- End .main -->
@endsection