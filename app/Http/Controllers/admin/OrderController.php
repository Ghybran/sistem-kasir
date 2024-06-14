<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Order;
use App\Models\Orderan;
use Illuminate\Http\Request;

class OrderController extends Controller

{
    public function order(Request $request)
    {
        $orders = collect(session('orders', []));

        if ($request->has('orderItem')) {
            $parts = explode('-', $request->input('orderItem'));
            if (count($parts) === 2) {
                [$item, $price] = $parts;
                $orders->push(['item' => $item, 'price' => (int) $price]);
            }
        }

        $totalPrice = $orders->sum('price');

        if ($request->has('submitOrder')) {
            $request->validate([
                'pemesan' => 'required',
            ]);

            $pemesan = $request->input('pemesan');

            Order::create([
                'pemesan' => $pemesan,
                'menu' => json_encode($orders),
                'total' => $totalPrice,
            ]);

            session()->forget('orders');

            return back()->with('message', 'Pesanan berhasil dikirim!');
        }

        session(['orders' => $orders]);

        return back()
            ->with('orderSummary', $orders)
            ->with('totalPrice', $totalPrice);
    }

    public function deleteOrderItem(Request $request)
    {
        session()->forget('orders');

        return back()->with('message', 'Semua pesanan telah dihapus.')
                     ->with('orderSummary', [])
                     ->with('totalPrice', 0);
    }
}


