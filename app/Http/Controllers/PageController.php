<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Product;
use App\Models\Comment;


class PageController extends Controller
{
    public function getIndex()
    {
        $slide = Slide::all();

        $new_product = Product::where('new', 1)
            ->paginate(4, ['*'], 'new-page');
        $top_products = Product::where('promotion_price', '<>', 0)
            ->paginate(4, ['*'], 'top-page');

        return view('page.homepage', compact('slide', 'new_product', 'top_products'));
    }

    public function getDetail(Request $request)
    {
        $product = Product::where('id', $request->id)->first();

        // Get related products (same category/type but different ID)
        $relatedProducts = Product::where('id_type', $product->id_type)
            ->where('id', '<>', $product->id)
            ->paginate(3);

        $comments = Comment::where('id_product', $request->id)->get();

        return view('page.product_detail', compact('product', 'relatedProducts', 'comments'));
    }


    public function getAddToCart($id)
    {
        return "Đã thêm sản phẩm $id vào giỏ (demo).";
    }



    public function getLoaiSp()
    {
        return view('page.product');
    }

    public function getChiTietSp()
    {
        return view('page.product_detail');
    }

    public function getLienHe()
    {
        return view('page.contact');
    }

    public function getGioiThieu()
    {
        return view('page.about');
    }
}
