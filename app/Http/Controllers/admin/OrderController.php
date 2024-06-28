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

    public function deleteall(Request $request)
    {
        session()->forget('orders');

        return back()->with('message', 'Semua pesanan telah dihapus.')
                     ->with('orderSummary', [])
                     ->with('totalPrice', 0);
    }




    public function deleteone(Request $request)
    {
        $index = $request->input('index');
        $orderSummary = session('orderSummary', []);

        if (isset($orderSummary[$index])) {
            unset($orderSummary[$index]);
            // Reindex the array
            $orderSummary = array_values($orderSummary);
            session(['orderSummary' => $orderSummary]);

            // Update the total price
            $totalPrice = array_sum(array_column($orderSummary, 'price'));
            session(['totalPrice' => $totalPrice]);
        }

        return back()->with('message', 'Pesanan telah dihapus.');
    }
}


