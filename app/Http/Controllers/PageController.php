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

        $new_product = Product::where('new',1)
        ->paginate(8, ['*'], 'new-page');
        $top_products = Product::where('promotion_price','<>',0)
        ->paginate(4, ['*'], 'top-page');

        return view('page.homepage', compact('slide', 'new_product', 'top_products'));
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
