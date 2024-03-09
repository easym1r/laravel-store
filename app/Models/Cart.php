<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    /**
     * Добавление записи с информацией о добавленном товаре в корзину
     *
     * @param $userId - Пользователь для чьей корзины будет добавлен товар
     * @param $productId - Выбранный Товар
     * @param $productQuantity - Количество товара
     *
     * @return Cart
     */
    public function addToCart($userId, $productId, $productQuantity): Cart
    {
        $cartItem = new Cart();
        $cartItem->user_id = $userId;
        $cartItem->product_id = $productId;
        $cartItem->quantity = $productQuantity;
        $cartItem->save();

        return $cartItem;
    }

    /**
     * Получение информации о корзине пользователя (товары в ней, общая стоимость корзины)
     *
     * @param $userId - Пользователь для чьей корзины будет получена информация
     *
     * @return array
     */
    public static function getUserCart($userId)
    {
        $productsCart = self::where('user_id', $userId)->get();

        $cartDetailInfo = [];
        $totalCartPrice = 0;

        foreach ($productsCart as $product) {
            $productInfo = Product::find($product->product_id);

            $cartDetailInfo[] = [
                'name' => $productInfo->name,
                'price' => $productInfo->price,
                'quantity' => $product->quantity,
                'total_price' => $productInfo->price * $product->quantity,
            ];

            $totalCartPrice += $productInfo->price * $product->quantity;
        }

        return ['cartProducts' => $cartDetailInfo, 'cartPrice' => $totalCartPrice];
    }
}
