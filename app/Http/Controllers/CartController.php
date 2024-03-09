<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CartController extends Controller
{
    public function showCart(): View
    {
        $userId = Auth::id();

        return view('cart', ['cartInfo' => Cart::getUserCart($userId)]);
    }

    public function addToCart(Request $request)
    {
        // Проверка авторизации пользователя (пополнение корзины доступно авторизованым пользователям)
        if (Auth::check()) {
            $userId = Auth::id();

            $productId = $request->id;
            $productQuantity = $request->quantity;

            $cart = new Cart();

            $addedProduct = $cart->addToCart($userId, $productId, $productQuantity);

            if ($addedProduct) {
                return response()->json(['data' => 'Товар успешно добавлен в корзину']);
            } else {
                return response()->json(['data' => 'Произошла ошибка при добавление товара в корзину. Обратитесь к администратору']);
            }
        } else {
            // Обработка случая, когда пользователь не авторизован
            return response()->json(['data' => 'Пользователь не авторизован'], 401);
        }
    }
}
