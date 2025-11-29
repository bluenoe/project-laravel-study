<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Comment;
use App\Models\BillDetail;
use App\Models\User;


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
        $product = Product::findOrFail($id);

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
    // sidebar: các loại sản phẩm
    $productTypes = ProductType::all();

    // tất cả sản phẩm, có phân trang
    $productsByType = Product::paginate(9); // mỗi trang 9 sp, thíc thì đổi số

    // không xem theo 1 loại cụ thể
    $type = null;

    return view('page.product', compact('productTypes', 'productsByType', 'type'));
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
    $productTypes = ProductType::all(); // sidebar

    // sản phẩm theo loại, có phân trang
    $productsByType = Product::where('id_type', $type)->paginate(9);

    // sản phẩm khác loại, vẫn paginate 3
    $otherProducts = Product::where('id_type', '<>', $type)->paginate(3);

    // loại hiện tại
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

public function postAdminAddForm(Request $request)
{
    // Validate dữ liệu đầu vào
    $request->validate([
        'inputName' => 'required|string|max:255',
        'inputPrice' => 'required|numeric|min:0',
        'inputPromotionPrice' => 'nullable|numeric|min:0',
        'inputUnit' => 'required|string|max:100',
        'inputNew' => 'required|integer|min:0|max:1',
        'inputType' => 'required|integer|exists:type_products,id',
        'inputImage' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        'inputDescription' => 'required|string',
    ]);

    $product = new Product();

    // Upload ảnh chuẩn
    $file_name = null;
    if ($request->hasFile('inputImage')) {
        $file = $request->file('inputImage');

        // Tên file đảm bảo không trùng
        $file_name = time() . "_" . $file->getClientOriginalName();

        // Lưu vào thư mục public/source/image/product
        $file->move(public_path('source/image/product'), $file_name);
    }

    // Gán dữ liệu
    $product->name = $request->inputName;
    $product->image = $file_name;
    $product->description = $request->inputDescription;
    $product->unit_price = $request->inputPrice;
    $product->promotion_price = $request->inputPromotionPrice ?? 0;
    $product->unit = $request->inputUnit;
    $product->new = $request->inputNew;
    $product->id_type = $request->inputType;

    $product->save();

    // Redirect đúng chuẩn
    return redirect()->route('admin.index')
        ->with('success', 'Thêm sản phẩm thành công!');
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
