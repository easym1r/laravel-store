<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * Создание записи о заказе
     *
     * @param $userId - Пользователь для которого будет оформлен заказ
     * @param $userCartInfo - Информация по заказу (список товаров, их общая стоимость)
     *
     * @return Order
     */
    public function makeOrder($userId, $userCartInfo): Order
    {
        $order = new Order();
        $order->user_id = $userId;
        $order->products_in_order = $userCartInfo['productsList'];
        $order->order_cost = $userCartInfo['cartPrice'];
        $order->status = 'Оформлен';
        $order->save();

        return $order;
    }

    /**
     * Получение полной стоимости всех оформленных заказов пользователя
     *
     * @param $userId - Пользователь по чьим заказам будет произведён расчёт
     *
     * @return mixed
     */
    public static function getTotalOrderCost($userId) {
        return self::where('user_id', $userId)->sum('order_cost');
    }

    /**
     * Удаление заказа
     *
     * @param $orderId - Айди заказа, который будет удален
     *
     * @return mixed
     */
    public static function deleteOrder($orderId)
    {
        return self::where('id', $orderId)->delete();
    }

    /**
     * Обновление статуса заказа
     *
     * @param $orderId - Айди заказа для которого будет изменено значение столбца "status"
     *
     * @return mixed
     */
    public static function confirmOrder($orderId)
    {
        $newStatus = 'Принят магазином'; // TODO добавить вариативность статуса, в идеале через коды (1-оформлен,2-принят и т.д.)

        return self::where('id', $orderId)->update(['status' => $newStatus]);
    }
}
