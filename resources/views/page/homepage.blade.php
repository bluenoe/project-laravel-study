@extends('master')
@section('content')
    <div class="fullwidthbanner-container">
        <div class="fullwidthbanner">
            <div class="bannercontainer">
                <div class="banner">
                    <ul>
                        <!-- THE FIRST SLIDE -->
                        @foreach ($slide as $sl)
                            <li data-transition="boxfade" data-slotamount="20" class="active-revslide"
                                style="width: 100%; height: 100%; overflow: hidden;">
                                <div class="slotholder" style="width: 100%; height: 100%;">
                                    <div class="tp-bgimg defaultimg" data-bgfit="cover" data-bgposition="center center"
                                        data-bgrepeat="no-repeat" src="/source/image/slide/{{ $sl->image }}"
                                        data-src="/source/image/slide/{{ $sl->image }}"
                                        style="background-color: transparent;
                        background-repeat: no-repeat;
                        background-image: url('/source/image/slide/{{ $sl->image }}');
                        background-size: cover;
                        background-position: center center;
                        width: 100%;
                        height: 100%;">
                                    </div>
                                </div>
                            </li>
                        @endforeach

                    </ul>

                </div>
            </div>
            <div class="tp-bannertimer"></div>
        </div>
    </div>


    <!--slider-->

    <div class="container">
        <div id="content" class="space-top-none">
            <div class="main-content">
                <div class="space60">&nbsp;</div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="beta-products-list">
                            <h4>New Products</h4>
                            <div class="beta-products-details">
                                <p class="pull-left">{{ count($new_product) }} styles found</p>
                                <div class="clearfix"></div>
                            </div>

                            <div class="row">
                                @foreach ($new_product as $new)
                                    <div class="col-sm-3">
                                        <div class="single-item">
                                            @if ($new->promotion_price != 0)
                                                <div class="ribbon-wrapper">
                                                    <div class="ribbon sale">I love you</div>
                                                </div>
                                            @endif
                                            <div class="single-item-header">
                                                <a href="product.html"><img src="source/image/product/{{ $new->image }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="single-item-body">
                                                <p class="single-item-title">{{ $new->name }}</p>
                                                <p class="single-item-price">
                                                    @if ($new->promotion_price > 0)
                                                        <span class="old-price"
                                                            style="text-decoration: line-through; color:#888; font-size: 14px; margin-right: 6px;">
                                                            {{ number_format($new->price) }}₫
                                                        </span>

                                                        <span class="new-price"
                                                            style="color:#e63946; font-weight: 600; font-size: 16px;">
                                                            {{ number_format($new->promotion_price) }}₫
                                                        </span>
                                                    @else
                                                        <span class="regular-price"
                                                            style="color:#222; font-weight: 600; font-size: 16px;">
                                                            {{ number_format($new->price) }}₫
                                                        </span>
                                                    @endif
                                                </p>

                                            </div>
                                            <div class="single-item-caption">
                                                <a class="add-to-cart pull-left" href="shopping_cart.html"><i
                                                        class="fa fa-shopping-cart"></i></a>
                                                <a class="beta-btn primary" href="product.html">Details <i
                                                        class="fa fa-chevron-right"></i></a>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            <!-- Pagination -->
                            <div class="row">{!! $new_product->links('pagination::bootstrap-4') !!}
                            </div>
                        </div> <!-- .beta-products-list -->

                        <div class="space50">&nbsp;</div>

                        <div class="beta-products-list">
                            <h4>Top Products</h4>
                            <div class="beta-products-details">
                                <p class="pull-left">{{count($sanpham_khuyenmai)}} styles found</p>
                                <div class="clearfix"></div>
                            </div>
                            <div class="row">
                                @foreach ($sanpham_khuyenmai as $spkm)
                                <div class="col-sm-3">
                                    <div class="single-item">
                                        <div class="single-item-header">
                                            <a href="product.html"><img src="source/assets/dest/images/products/1.jpg"
                                                    alt=""></a>
                                        </div>
                                        <div class="single-item-body">
                                            <p class="single-item-title">Sample Woman Top</p>
                                            <p class="single-item-price">
                                                <span>$34.55</span>
                                            </p>
                                        </div>
                                        <div class="single-item-caption">
                                            <a class="add-to-cart pull-left" href="shopping_cart.html"><i
                                                    class="fa fa-shopping-cart"></i></a>
                                            <a class="beta-btn primary" href="product.html">Details <i
                                                    class="fa fa-chevron-right"></i></a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="space40">&nbsp;</div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="single-item">
                                        <div class="single-item-header">
                                            <a href="product.html"><img src="source/assets/dest/images/products/1.jpg"
                                                    alt=""></a>
                                        </div>
                                        <div class="single-item-body">
                                            <p class="single-item-title">Sample Woman Top</p>
                                            <p class="single-item-price">
                                                <span>$34.55</span>
                                            </p>
                                        </div>
                                        <div class="single-item-caption">
                                            <a class="add-to-cart pull-left" href="shopping_cart.html"><i
                                                    class="fa fa-shopping-cart"></i></a>
                                            <a class="beta-btn primary" href="product.html">Details <i
                                                    class="fa fa-chevron-right"></i></a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="single-item">
                                        <div class="ribbon-wrapper">
                                            <div class="ribbon sale">Sale</div>
                                        </div>

                                        <div class="single-item-header">
                                            <a href="product.html"><img src="source/assets/dest/images/products/2.jpg"
                                                    alt=""></a>
                                        </div>
                                        <div class="single-item-body">
                                            <p class="single-item-title">Sample Woman Top</p>
                                            <p class="single-item-price">
                                                <span class="flash-del">$34.55</span>
                                                <span class="flash-sale">$33.55</span>
                                            </p>
                                        </div>
                                        <div class="single-item-caption">
                                            <a class="add-to-cart pull-left" href="shopping_cart.html"><i
                                                    class="fa fa-shopping-cart"></i></a>
                                            <a class="beta-btn primary" href="product.html">Details <i
                                                    class="fa fa-chevron-right"></i></a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="single-item">
                                        <div class="single-item-header">
                                            <a href="product.html"><img src="source/assets/dest/images/products/3.jpg"
                                                    alt=""></a>
                                        </div>
                                        <div class="single-item-body">
                                            <p class="single-item-title">Sample Woman Top</p>
                                            <p class="single-item-price">
                                                <span>$34.55</span>
                                            </p>
                                        </div>
                                        <div class="single-item-caption">
                                            <a class="add-to-cart pull-left" href="shopping_cart.html"><i
                                                    class="fa fa-shopping-cart"></i></a>
                                            <a class="beta-btn primary" href="product.html">Details <i
                                                    class="fa fa-chevron-right"></i></a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="single-item">
                                        <div class="single-item-header">
                                            <a href="product.html"><img src="source/assets/dest/images/products/3.jpg"
                                                    alt=""></a>
                                        </div>
                                        <div class="single-item-body">
                                            <p class="single-item-title">Sample Woman Top</p>
                                            <p class="single-item-price">
                                                <span>$34.55</span>
                                            </p>
                                        </div>
                                        <div class="single-item-caption">
                                            <a class="add-to-cart pull-left" href="shopping_cart.html"><i
                                                    class="fa fa-shopping-cart"></i></a>
                                            <a class="beta-btn primary" href="product.html">Details <i
                                                    class="fa fa-chevron-right"></i></a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- .beta-products-list -->
                    </div>
                </div> <!-- end section with sidebar and main content -->


            </div> <!-- .main-content -->
        </div> <!-- #content -->
    </div> <!-- .container -->
@endsection
