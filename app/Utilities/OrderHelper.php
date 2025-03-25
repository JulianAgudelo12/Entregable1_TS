<?php

/* Developed by Julian Agudelo Cifuentes */

namespace App\Utilities;

use App\Models\Order;

class OrderHelper
{
    public static function fillOrderData(Order $order, int $userId): void
    {
        $order->setUserId($userId);
        $order->setPrice(0);
        $order->setState('active');
        $order->setPaymentMethod('pending');
    }
}
