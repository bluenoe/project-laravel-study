@extends('master')
@section('content')

    <div class="inner-header">
        <div class="container">
            <div class="pull-left">
                <h6 class="inner-title">Sản Phẩm {{ $sanpham->name }}</h6>
            </div>
            <div class="pull-right">
                <div class="beta-breadcrumb font-large">
                    <a href="/trangchu">Home</a> / <span>Details</span>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="container">
        <div id="content">
            <div class="row">

                {{-- LEFT CONTENT --}}
                <div class="col-sm-9">

                    <div class="row">
                        {{-- IMAGE --}}
                        <div class="col-sm-4">
                            <img src="/source/image/product/{{ $sanpham->image }}" alt="">
                        </div>

                        {{-- PRODUCT DETAIL --}}
                        <div class="col-sm-8">
                            <div class="single-item-body">

                                {{-- TITLE --}}
                                <p class="single-item-title">
                                <h2>{{ $sanpham->name }}</h2>
                                </p>

                                {{-- PRICE --}}
                                <p class="single-item-price" style="text-align:left; font-size: 15px;">

                                    @if ($sanpham->promotion_price == 0)
                                        {{-- Giá bình thường --}}
                                        <span style="color:#222; font-weight:600; font-size:16px;">
                                            {{ number_format($sanpham->unit_price) }} Đồng
                                        </span>
                                    @else
                                        {{-- Giá gốc --}}
                                        <span
                                            style="text-decoration:line-through; color:#888; font-size:14px; margin-right:6px;">
                                            {{ number_format($sanpham->unit_price) }} Đồng
                                        </span>

                                        {{-- Giá giảm --}}
                                        <span style="color:#e63946; font-weight:600; font-size:16px;">
                                            {{ number_format($sanpham->promotion_price) }} Đồng
                                        </span>
                                    @endif

                                </p>

                            </div>

                            <div class="clearfix"></div>
                            <div class="space20">&nbsp;</div>

                            {{-- DESCRIPTION --}}
                            <div class="single-item-desc">
                                {!! $sanpham->description !!}
                            </div>

                            <div class="space20">&nbsp;</div>

                            <p>Số lượng:</p>

                            {{-- QUANTITY SELECT --}}
                            <div class="single-item-options">
                                <select class="wc-select" name="color">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>

                                {{-- ADD TO CART --}}
                                <a class="add-to-cart" href="{{ route('themgiohang', $sanpham->id) }}">
                                    <i class="fa fa-shopping-cart"></i>
                                </a>

                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>

                    <div class="space40">&nbsp;</div>

                    {{-- TABS --}}
                    <div class="woocommerce-tabs">
                        <ul class="tabs">
                            <li><a href="#tab-description">Description</a></li>
                            <li><a href="#tab-comment">Comments</a></li>
                        </ul>

                        {{-- DESCRIPTION TAB --}}
                        <div class="panel" id="tab-description">
                            <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit...</p>
                            <p>Consectetur, adipisci velit, sed quia non numquam eius modi tempora...</p>
                        </div>

                        {{-- COMMENT TAB --}}
                        <div class="panel" id="tab-comment">

                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="card-body">
                                            <form method="post" action="/comment/{{ $sanpham->id }}">
                                                @csrf
                                                <div class="form-group">
                                                    <textarea class="form-control" name="comment" required></textarea>
                                                </div>
                                                <button type="submit" class="beta-btn primary">Bình luận</button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            {{-- SHOW COMMENTS --}}
                            @if (isset($comments))
                                @foreach ($comments as $comment)
                                    <p class="border-bottom">
                                        <b class="pull-left">{{ $comment->username }}</b><br>
                                        {{ $comment->comment }}
                                    </p>
                                    <br>
                                @endforeach
                            @else
                                <p>Chưa có bình luận nào cả!</p>
                            @endif

                        </div>
                    </div>

                    <div class="space50">&nbsp;</div>

                    {{-- RELATED PRODUCTS --}}
                    <div class="beta-products-list">
                        <h4>Related Products</h4>

                        <div class="row">
                            @foreach ($splienquan as $sp)
                                <div class="col-sm-4">
                                    <div class="single-item">

                                        {{-- IMAGE --}}
                                        <div class="single-item-header">
                                            <a href="detail/{{ $sp->id }}">
                                                <img src="/source/image/product/{{ $sp->image }}" alt="">
                                            </a>
                                            @if ($sp->promotion_price != 0)
                                                <div class="ribbon-wrapper">
                                                    <div class="ribbon sale">Sale</div>
                                                </div>
                                            @endif
                                        </div>

                                        {{-- BODY --}}
                                        <div class="single-item-body">
                                            <p class="single-item-title">{{ $sp->name }}</p>

                                            <p class="single-item-price" style="text-align:left; font-size: 15px;">

                                                @if ($sp->promotion_price == 0)
                                                    {{-- Giá bình thường --}}
                                                    <span style="color:#222; font-weight:600; font-size:16px;">
                                                        {{ number_format($sp->unit_price) }} Đồng
                                                    </span>
                                                @else
                                                    {{-- Giá gốc --}}
                                                    <span
                                                        style="text-decoration:line-through; color:#888; font-size:14px; margin-right:6px;">
                                                        {{ number_format($sp->unit_price) }} Đồng
                                                    </span>

                                                    {{-- Giá giảm --}}
                                                    <span style="color:#e63946; font-weight:600; font-size:16px;">
                                                        {{ number_format($sp->promotion_price) }} Đồng
                                                    </span>
                                                @endif

                                            </p>

                                        </div>

                                        {{-- ACTION --}}
                                        <div class="single-item-caption">
                                            <a class="add-to-cart pull-left" href="{{ route('themgiohang', $sp->id) }}">
                                                <i class="fa fa-shopping-cart"></i>
                                            </a>

                                            <a class="beta-btn primary" href="detail/{{ $sp->id }}">
                                                Details <i class="fa fa-chevron-right"></i>
                                            </a>
                                            <div class="clearfix"></div>
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>

                {{-- RIGHT SIDEBAR --}}
                <div class="col-sm-3 aside">
                    <div class="widget">
                        <h3 class="widget-title">Best Sellers</h3>
                        <div class="widget-body">

                            <div class="beta-sales beta-lists">

                                {{-- STATIC SAMPLE (nếu bà muốn dùng DB update sau) --}}
                                <div class="media beta-sales-item">
                                    <a class="pull-left" href="product.html">
                                        <img src="source/assets/dest/images/products/sales/1.png" alt="">
                                    </a>
                                    <div class="media-body">
                                        Sample Woman Top
                                        <span class="beta-sales-price">$34.55</span>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                    {{-- MORE WIDGETS... --}}

                </div>

            </div> {{-- row --}}
        </div> {{-- #content --}}
    </div> {{-- container --}}

@endsection
