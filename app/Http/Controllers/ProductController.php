<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function showProductList(): View
    {
        return view('products', ['products' => Product::all()]);
    }

    public function showProductDetailInfo($product_id): View
    {
        return view('product-detail', ['product' => Product::getProductDetailInfo($product_id)]);
    }
}
