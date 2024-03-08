<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function showProductList()
    {
        return view('products', ['products' => Product::all()]);
    }

    public function showProductDetailInfo($product_id)
    {
        $productInfo = Product::getProductDetailInfo($product_id);

        return view('product-detail', ['product' => $productInfo]);
    }
}
