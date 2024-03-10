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
    public static function getUserCart($userId): array
    {
        $productsCart = self::where('user_id', $userId)->get();

        $cartDetailInfo = [];
        $totalCartPrice = 0;

        foreach ($productsCart as $product) {
            $productInfo = Product::find($product->product_id);

            $cartDetailInfo[] = [
                'id' => $product->product_id,
                'name' => $productInfo->name,
                'price' => $productInfo->price,
                'quantity' => $product->quantity,
                'image_file_name' => $productInfo->image_file_name,
                'position_in_cart' => $product->id,
                'total_price' => $productInfo->price * $product->quantity,
            ];

            $totalCartPrice += $productInfo->price * $product->quantity;
        }

        return ['cartProducts' => $cartDetailInfo, 'cartPrice' => $totalCartPrice];
    }

    /**
     * Обновление количества товара в корзине по указанной записи в таблице корзины
     *
     * @param $productCartPosition - Позиция товара в коризне (столбец 'id')
     * @param $productQuantity - Количество товара
     *
     * @return bool
     */
    public function productQuantityUpdate($productCartPosition, $productQuantity): bool
    {
        $cartItem = Cart::find($productCartPosition);

        if ($cartItem) {
            $cartItem->quantity = $productQuantity;
            $cartItem->save();

            return true;
        } else {
            return false;
        }
    }

    /**
     * Получение данных по корзине пользователя необходимых для заполнения заказа
     *
     * @param $userId - Пользователь по чьей корзины будет получена информация
     *
     * @return array
     */
    public function getUserCartForMakeOrder($userId): array
    {
        $productsCart = self::where('user_id', $userId)->get();

        $productsList = '';
        $totalCartPrice = 0;

        foreach ($productsCart as $product) {
            $productInfo = Product::find($product->product_id);

            $productsList .= ', ' . $productInfo->name . ' ('. $product->quantity . 'шт. по ' . $productInfo->price . 'Р)';

            $totalCartPrice += $productInfo->price * $product->quantity;
        }

        $productsList = mb_substr($productsList, 2);

        return ['productsList' => $productsList, 'cartPrice' => $totalCartPrice];
    }

    /**
     * Очистка корзины для указанного пользователя
     *
     * @param $userId - Пользователь для которого будет произведена очистка корзины
     *
     * @return bool
     */
    public function clearCart($userId): bool
    {
        if (self::where('user_id', $userId)->delete()) {
            return true;
        } else {
            return false;
        }
    }
}
