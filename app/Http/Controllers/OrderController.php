<?php

/* Developed by Julian Agudelo Cifuentes */

namespace App\Http\Controllers;

use App\Models\Order;
use App\Utilities\OrderHelper;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function create(): RedirectResponse
    {
        $user = Auth::user();

        if ($user->order) {
            return redirect()->route('order.show', $user->order->getId());
        }

        $order = new Order;
        OrderHelper::fillOrderData($order, $user->getId());
        $order->save();

        return redirect()->route('order.show', $order->getId());
    }

    public function show(int $id): View
    {
        $viewData = [];
        $viewData['title'] = __('order.title_show');
        $viewData['subtitle'] = __('order.subtitle_show');
        $viewData['order'] = Order::with('items')->findOrFail($id);

        return view('order.show')->with('viewData', $viewData);
    }
}
