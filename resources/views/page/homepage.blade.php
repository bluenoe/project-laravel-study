@extends('master')
@section('content')
    <div class="fullwidthbanner-container">
        <div class="fullwidthbanner">
            <div class="bannercontainer">
                <div class="banner">
                    <ul>
                        <!-- THE FIRST SLIDE -->
                        @foreach ($slides as $sl)
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
                                <p class="pull-left">{{ $newProducts->total() }} styles found</p>
                                <div class="clearfix"></div>
                            </div>

                            <div class="row">
                                @foreach ($newProducts as $new)
                                    <div class="col-sm-3">
                                        <div class="single-item">
                                            @if ($new->promotion_price != 0)
                                                <div class="ribbon-wrapper">
                                                    <div class="ribbon sale">I love you</div>
                                                </div>
                                            @endif
                                            <div class="single-item-header">
                                                <a href="detail/{{ $new->id }}"><img width="200" height="200"
                                                        src="source/image/product/{{ $new->image }}" alt=""></a>
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
                            <div class="col-sm-12 text-left">
                                {!! $newProducts->links('pagination::bootstrap-4') !!}
                            </div>
                        </div> <!-- .beta-products-list -->

                        <div class="space50">&nbsp;</div>

                        <div class="beta-products-list">
                            <h4>Top Products</h4>

                            <div class="beta-products-details">
                                <p class="pull-left">{{ $topProducts->total() }} styles found</p>
                                <div class="clearfix"></div>
                            </div>

                            <div class="row">
                                @foreach ($topProducts as $spkm)
                                    <div class="col-sm-3">
                                        <div class="single-item">

                                            <div class="single-item-header">
                                                <a href="detail/{{ $spkm->id }}">
                                                    <img width="200" height="200"
                                                        src="source/image/product/{{ $spkm->image }}" alt="">
                                                </a>
                                                @if ($spkm->promotion_price > 0)
                                                    <div class="ribbon-wrapper">
                                                        <div class="ribbon sale">Sale</div>
                                                    </div>
                                                @endif
                                            </div>

                                            <div class="single-item-body">
                                                <p class="single-item-title">{{ $spkm->name }}</p>

                                                <p class="single-item-price">
                                                    @if ($spkm->promotion_price > 0)
                                                        <span class="old-price"
                                                            style="text-decoration: line-through; color:#888; font-size: 14px; margin-right: 6px;">
                                                            {{ number_format($spkm->price) }}₫
                                                        </span>

                                                        <span class="new-price"
                                                            style="color:#e63946; font-weight: 600; font-size: 16px;">
                                                            {{ number_format($spkm->promotion_price) }}₫
                                                        </span>
                                                    @else
                                                        <span class="regular-price"
                                                            style="color:#222; font-weight: 600; font-size: 16px;">
                                                            {{ number_format($spkm->price) }}₫
                                                        </span>
                                                    @endif
                                                </p>
                                            </div>

                                            <div class="single-item-caption">
                                                <a class="add-to-cart pull-left" href="shopping_cart.html">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </a>
                                                <a class="beta-btn primary" href="product.html">
                                                    Details <i class="fa fa-chevron-right"></i>
                                                </a>
                                                <div class="clearfix"></div>
                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="row" style="margin-top: 20px;">
                                <!-- Pagination -->
                                <div class="col-sm-12 text-left">
                                    {!! $topProducts->links('pagination::bootstrap-4') !!}
                                </div>
                            </div>
                        </div>

                    </div><!-- .beta-products-list -->

                </div>
            </div> <!-- end section with sidebar and main content -->


        </div> <!-- .main-content -->
    </div> <!-- #content -->
    </div> <!-- .container -->
@endsection
