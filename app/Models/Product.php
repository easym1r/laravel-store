<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Модель для работы с продуктом
 */
class Product extends Model
{
    use HasFactory;

    /**
     * Поиск в таблице с продуктами 9 самых популярных продуктов.
     *
     * Рейтинг популярных продуктов выстраивается исходя из количества добавлений продукта в корзину пользователями
     *
     * @return mixed
     */
    public static function getPopularProducts()
    {
        return self::orderBy('cart_additions', 'desc')->take(9)->get();
    }

    /**
     * Получение всей информации по выбранному продукту
     *
     * @param $id - Айди продукта
     *
     * @return mixed
     */
    public static function getProductDetailInfo($id)
    {
        return self::where('id', $id)->first();
    }
}
