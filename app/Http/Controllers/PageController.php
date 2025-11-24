<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Product;
use App\Models\Comment;
use App\Models\ProductType;
use App\Models\BillDetail;


class PageController extends Controller
{
    /**
     * Trang chủ
     */
    public function index()
    {
        $slides = Slide::all();

        $newProducts = Product::where('new', 1)
            ->paginate(4, ['*'], 'new-page');

        $topProducts = Product::where('promotion_price', '<>', 0)
            ->paginate(4, ['*'], 'top-page');

        return view('page.homepage', compact('slides', 'newProducts', 'topProducts'));
    }

    /**
     * Chi tiết sản phẩm
     */
    public function show($id)
    {
        $product = Product::findOrFail($id)->first();

        // Sản phẩm liên quan (cùng loại)
        $relatedProducts = Product::where('id_type', $product->id_type)
            ->where('id', '<>', $product->id)
            ->paginate(3);

        // Comment của sản phẩm
        $comments = Comment::where('id_product', $id)->get();

        return view('page.product_detail', compact('product', 'relatedProducts', 'comments'));
    }

    /*
     * Loại sản phẩm (Category)
    */
    public function showCategory()
    {
        return view('page.product');
    }
    

    /**
     * Thêm giỏ hàng
     */
    public function addToCart($id)
    {
        return "Đã thêm sản phẩm $id vào giỏ (demo).";
    }

    /**
     * Liên hệ
     */
    public function contact()
    {
        return view('page.contact');
    }

    /**
     * Giới thiệu
     */
    public function about()
    {
        return view('page.about');
    }


    /**
     * Sản phẩm theo loại
     */
    public function getProductByType($type)
    {
        $productTypes = ProductType::all();       // show ra ten loai sp

        $productsByType = Product::where('id_type', $type)->get();

        $otherProducts = Product::where('id_type', '<>', $type)->paginate(3);

        // Get the current type
        $type = ProductType::find($type);

        return view('page.product', compact('productsByType', 'productTypes', 'otherProducts', 'type'));
    }

/**
     * Trang admin
     */

    public function getIndexAdmin()
    {
        $products =  Product::all();
        return view('pageadmin.admin')->with(['products' => $products, 'sumSold' => count(BillDetail::all())]);
    }

    public function export()
{
    return "Export PDF here!";

}
    public function getAdminAddForm()
    {
        return view('pageadmin.formAdd');
    }

    public function getAdminEditForm($id)
    {
        $product = Product::findOrFail($id);
        return view('pageadmin.formEdit', compact('product'));
    }


    public function getAdminDeleteForm($id)
{
    $product = Product::findOrFail($id);
    return view('pageadmin.formDelete', compact('product'));
}

public function deleteProduct($id)
{
    $product = Product::findOrFail($id);
    $product->delete();

    return redirect()->route('admin.index')
        ->with('success', 'Đã xóa sản phẩm thành công.');
}

}
