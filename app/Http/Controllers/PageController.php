<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;    
use App\Models\Slide;
use App\Models\Product;

class PageController extends Controller
{
    public function getIndex()
    {
        $slide = Slide::all();
        $new_product = Product::where('new',1)->paginate(8);
        $sanpham_khuyenmai = Product::where('promotion_price','<>',0)->paginate(4);
        return view('page.homepage', compact('slide', 'new_product', 'sanpham_khuyenmai'));
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
