<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Order;

class RecalculateTotalPriceForOrders extends Migration
{
    public function up()
    {
        $orders = Order::all();

        foreach ($orders as $order) {
            $totalPrice = $order->product->price * $order->quantity;
            $order->total_price = $totalPrice;
            $order->save();
        }
    }

    public function down()
    {
        // No need to rollback anything
    }
}
