<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\ProductType;

use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }


    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        view()->composer('header', function ($view) {
            $category = ProductType::all();               // $loai_sp = category
            $view->with('categories', $category);

        });
        
        view()->composer('product', function ($view) {
            $product_new = Product::where('new',1)->orderBy('id', 'DESC')->skip(1)->take(8)->get();// $all_sp = allProduct
            $view->with('product_new', $product_new);
        });
    }
}
