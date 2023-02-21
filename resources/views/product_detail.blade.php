@extends("./templates/main")

@section("main")

<main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                <div class="container d-flex align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Products</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Default</li>
                    </ol>

                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="container">
                    <div class="product-details-top">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="product-gallery product-gallery-vertical">
                                    <div class="row">
                                        <figure class="product-main-image">
                                            @php
                                                $img_feature = DB::table("images")->where("product_id", $product[0]->id)->get()[0]->link;
                                            @endphp
                                            <img id="product-zoom" src="{{asset('images/' .$img_feature )}}" data-zoom-image="{{asset('images/'.$img_feature)}}" alt="product image">

                                            <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                                <i class="icon-arrows"></i>
                                            </a>
                                        </figure><!-- End .product-main-image -->

                                        <div id="product-zoom-gallery" class="product-image-gallery">


                                        
                                            @php
                                                $img = DB::table("images")->where("product_id", $product[0]->id)->get();
                                            @endphp
                                            @foreach($img as $key)
                                                
                                                    <a class="product-gallery-item" href="#" data-image="{{asset('images/' . $key->link)}}" data-zoom-image="{{asset('images/' . $key->link)}}">
                                                        <img src="{{asset('images/' . $key->link)}}" alt="product side">
                                                    </a>
                                            @endforeach
                                            
                                        </div><!-- End .product-image-gallery -->
                                    </div><!-- End .row -->
                                </div><!-- End .product-gallery -->
                            </div><!-- End .col-md-6 -->

                            <div class="col-md-6">
                                <div class="product-details">
                                    <h1 class="product-title">{{$product[0]->name}}</h1><!-- End .product-title -->

                                    

                                    <div class="product-price">
                                        {{number_format($product[0]->sale_price)}}
                                    </div><!-- End .product-price -->

                                    <div class="product-content" id="content">
                                        
                                    </div><!-- End .product-content -->
                                    <script>
                                        document.getElementById("content").innerHTML = "{!! $product[0]->content !!}";
                                    </script>
                                    <form action="/cart" method="post" onsubmit="return check()">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{$product[0]->id}}">
                                    <div class="details-filter-row details-row-size">
                                        <label for="qty">Số lượng</label>
                                        <div class="product-details-quantity">
                                            <input type="number" id="qty" class="form-control" value="1" min="1" max="10" step="1" data-decimals="0" required name="quantity">
                                        </div><!-- End .product-details-quantity -->
                                    </div><!-- End .details-filter-row -->

                                    <div class="product-details-action">
                                        <button type="submit" class="btn-product btn-cart"><span>Thêm vào giỏ hàng</span></button>
                                    </div><!-- End .product-details-action -->
                                    </form>
                                </div><!-- End .product-details -->
                            </div><!-- End .col-md-6 -->
                        </div><!-- End .row -->
                    </div><!-- End .product-details-top -->

                    <div class="product-details-tab">
                        <ul class="nav nav-pills justify-content-center" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab" role="tab" aria-controls="product-desc-tab" aria-selected="true">Thông tin cấu hình</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="content-desc-link" data-toggle="tab" href="#content-desc-link" role="tab" aria-controls="content-desc-link" aria-selected="false">Thông tin cấu hình</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel" aria-labelledby="product-desc-link">
                                <div class="product-desc-content">
                                    <h2 class="text-center">Sản phẩm: {{$product[0]->name}}</h3>
                                    <table class="table table-striped">
                                        <tr class="">
                                            <th class="table-col-6 text-center">Kích thước màn hình</th>
                                            <th class="table-col-6 text-center">{{$product[0]->display_size}}</th>
                                        </tr>
                                        
                                        <tr class="">
                                            <th class="table-col-6 text-center">Camera</th>
                                            <th class="table-col-6 text-center" style="width: 500px;">{{$product[0]->camera}}</th>
                                        </tr>
                                        
                                        <tr class="">
                                            <th class="table-col-6 text-center">Chipset</th>
                                            <th class="table-col-6 text-center" style="width: 500px;">{{$product[0]->cpu}}</th>
                                        </tr>
                                        <tr class="">
                                            <th class="table-col-6 text-center">Dung lượng ram</th>
                                            <th class="table-col-6 text-center" style="width: 500px;">{{$product[0]->ram}}</th>
                                        </tr>
                                        
                                        <tr class="">
                                            <th class="table-col-6 text-center">Pin</th>
                                            <th class="table-col-6 text-center" style="width: 500px;">{{$product[0]->pin}}</th>
                                        </tr>
                                        
                                        <tr class="">
                                            <th class="table-col-6 text-center">Hệ điều hành</th>
                                            <th class="table-col-6 text-center" style="width: 500px;">{{$product[0]->os}}</th>
                                        </tr>
                                    </table>
                                    

                                </div><!-- End .product-desc-content -->
                            </div><!-- .End .tab-pane -->
                            
                        </div><!-- End .tab-content -->
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="content-desc-link" role="tabpanel" aria-labelledby="content-desc-link">
                                
                            </div><!-- .End .tab-pane -->
                            
                        </div><!-- End .tab-content -->
                    </div><!-- End .product-details-tab -->

                    <h2 class="title text-center mb-4">Có thể bạn quan tâm</h2><!-- End .title text-center -->

                    <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                        data-owl-options='{
                            "nav": false, 
                            "dots": true,
                            "margin": 20,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":1
                                },
                                "480": {
                                    "items":2
                                },
                                "768": {
                                    "items":3
                                },
                                "992": {
                                    "items":4
                                },
                                "1200": {
                                    "items":4,
                                    "nav": true,
                                    "dots": false
                                }
                            }
                        }'>
                        @if(isset($products))
                        @foreach($products as $key)
                            @php
                                $img = DB::table("images")->select("link")->where("product_id", $key->id)->get()[0]->link;
                            @endphp
                        <div class="product product-7 text-center">
                            <figure class="product-media">
                                <span class="product-label label-new">New</span>
                                <a href="product.html">
                                    <img src="{{asset('images/' . $key->link)}}" alt="Product image" class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="/quickView/{{$key->id}}" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                </div><!-- End .product-action-vertical -->

                                <div class="product-action">
                                    <a href="#" class="btn-product btn-cart"><span>Thêm vào giỏ hàng</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <h3 class="product-title"><a href="product.html">{{$key->name}}</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    {{number_format($key->sale_price)}}
                                </div><!-- End .product-price -->
                                
                            </div><!-- End .product-body -->
                        
                        </div><!-- End .product -->
                       @endforeach

                       @endif
                    </div><!-- End .owl-carousel -->
                </div><!-- End .container -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->
@endsection