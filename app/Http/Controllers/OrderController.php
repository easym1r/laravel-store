<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function showOrder()
    {
        return view('order', ['orderList' => Order::all(), 'totalOrderPrice' => Order::getTotalOrderCost(Auth::id())]);
    }

    public function orderMake()
    {
        if (Auth::check()) {
            $userId = Auth::id();

            $cart = new Cart();
            $order = new Order();

            $userCartInfo = $cart->getUserCartForMakeOrder($userId);

            $addedOrder = $order->makeOrder($userId, $userCartInfo);

            if ($addedOrder) {
                $cart->clearCart($userId);

                return response()->json(['data' => 'Заказ успешно сформирован']);
            } else {
                return response()->json(['data' => 'Произошла ошибка при оформление заказа. Обратитесь к администратору'], 422);
            }
        } else {
            return response()->json(['data' => 'Пользователь не авторизован'], 401);
        }
    }

    public function orderDelete(Request $request)
    {
        if (Auth::check()) {
            $orderId = $request->orderId;

            if (Order::deleteOrder($orderId)) {
                return response()->json(['data' => 'Заказ успешно удален']);
            } else {
                return response()->json(['data' => 'Произошла ошибка при удалении заказа. Обратитесь к администратору'], 422);
            }
        } else {
            return response()->json(['data' => 'Пользователь не авторизован'], 401);
        }
    }

    public function orderConfirm(Request $request)
    {
        if (Auth::check()) {
            $orderId = $request->orderId;

            if (Order::confirmOrder($orderId)) {
                return response()->json(['data' => 'Заказ успешно удален']);
            } else {
                return response()->json(['data' => 'Произошла ошибка при удалении заказа. Обратитесь к администратору'], 422);
            }
        } else {
            return response()->json(['data' => 'Пользователь не авторизован'], 401);
        }
    }
}
