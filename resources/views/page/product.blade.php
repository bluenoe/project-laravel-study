@extends('master')

@section('content')

<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Sản phẩm {{ $type->name }}</h6>
        </div>

        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="{{ url('/') }}">Home</a> / <span>Sản phẩm</span>
            </div>
        </div>

        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content" class="space-top-none">

        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="space60">&nbsp;</div>

            <div class="row">

                <!-- SIDEBAR (Product Types) -->
                <div class="col-sm-3">
                    <ul class="aside-menu">
                        @foreach($productTypes as $pt)
                            <li>
                                <a href="{{ url('/type/' . $pt->id) }}">{{ $pt->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- PRODUCT LIST -->
                <div class="col-sm-9">

                    <div class="beta-products-list">

                        <!-- Title -->
                        <h4 style="text-align:center; font-weight:bold;">
                            {{ $type->name }}
                        </h4>

                        <!-- COUNT -->
                        <div class="beta-products-details">
                            <p class="pull-left">{{ count($productsByType) }} styles found</p>
                            <div class="clearfix"></div>
                        </div>

                        <!-- PRODUCTS BY TYPE -->
                        <div class="row">
                            @foreach($productsByType as $p)
                                <div class="col-sm-4">
                                    <div class="single-item">

                                        <div class="single-item-header">
                                            <a href="#">
                                                <img width="200" height="200"
                                                     src="/source/image/product/{{ $p->image }}"
                                                     alt="">
                                            </a>
                                        </div>

                                        <div class="single-item-body">
                                            <p class="single-item-title">{{ $p->name }}</p>

                                            <p class="single-item-price" style="text-align:left; font-size: 15px;">
                                                @if($p->promotion_price == 0)
                                                    <span class="flash-sale">{{ number_format($p->unit_price) }} Đồng</span>
                                                @else
                                                    <span class="flash-del">{{ number_format($p->unit_price) }} Đồng</span>
                                                    <span class="flash-sale">{{ number_format($p->promotion_price) }} Đồng</span>
                                                @endif
                                            </p>
                                        </div>

                                        <div class="single-item-caption">
                                            <a class="add-to-cart pull-left"
                                               href="{{ route('cart.add', $p->id) }}">
                                                <i class="fa fa-shopping-cart"></i>
                                            </a>

                                            <a class="add-to-cart pull-left" href="#">
                                                <i class="fa fa-heart"></i>
                                            </a>

                                            <a class="beta-btn primary"
                                               href="{{ url('/type/' . $p->id) }}">
                                                Details <i class="fa fa-chevron-right"></i>
                                            </a>

                                            <div class="clearfix"></div>
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- SPACE -->
                        <div class="space50">&nbsp;</div>

                    </div> <!-- .beta-products-list -->


                    <!-- OTHER PRODUCTS -->
                    <div class="beta-products-list">

                        <h4>Sản phẩm khác</h4>

                        <div class="beta-products-details">
                            <p class="pull-left">{{ count($otherProducts) }} founded</p>
                            <div class="clearfix"></div>
                        </div>

                        <div class="row">
                            @foreach($otherProducts as $op)
                                <div class="col-sm-3">
                                    <div class="single-item">

                                        <div class="single-item-header">
                                            <a href="#">
                                                <img width="200" height="200"
                                                     src="/source/image/product/{{ $op->image }}"
                                                     alt="">
                                            </a>

                                            @if($op->promotion_price != 0)
                                                <div class="ribbon-wrapper">
                                                    <div class="ribbon sale">Sale!</div>
                                                </div>
                                            @endif
                                        </div>

                                        <div class="single-item-body">
                                            <p class="single-item-title">{{ $op->name }}</p>

                                            <p class="single-item-price" style="text-align:left; font-size: 15px;">
                                                @if($op->promotion_price == 0)
                                                    <span class="flash-sale">{{ number_format($op->unit_price) }} Đồng</span>
                                                @else
                                                    <span class="flash-del">{{ number_format($op->unit_price) }} Đồng</span>
                                                    <span class="flash-sale">{{ number_format($op->promotion_price) }} Đồng</span>
                                                @endif
                                            </p>
                                        </div>

                                        <div class="single-item-caption">
                                            <a class="add-to-cart pull-left"
                                               href="shopping_cart.html">
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

                        <!-- PAGINATION -->
                        <div class="row">
                            {{ $otherProducts->links('pagination::bootstrap-4') }}
                        </div>

                        <div class="space40">&nbsp;</div>

                    </div> <!-- .beta-products-list -->

                </div> <!-- .col-sm-9 -->

            </div> <!-- .row -->

        </div> <!-- .main-content -->

    </div> <!-- #content -->
</div> <!-- container -->

@endsection
