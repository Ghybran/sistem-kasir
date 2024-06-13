<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Order;
use App\Models\Orderan;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    function men()
    {
     $menu=Menu::all();
     return view('admin.halaman',compact('menu'));
    }
    function ord()
    {
     $orderan= new Orderan([
        'pemesan'=>request('pemesan'),
        'id_menu'=>request('id_menu'),
        'total'=>request('total')
     ]);
     $orderan->save();
     return redirect()->back()->with('succes','orderan berhasil');
    }





    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'pemesan' => 'required|string',
            'items' => 'required|array',
            'items.*.id_menu' => 'required|integer|exists:menu,id',
        ]);

        $total = 0;

        // Hitung total harga berdasarkan id_menu
        foreach ($request->input('item') as $item) {
            $menu = Menu::findOrFail($item['id_menu']);
            $total += $menu->price;
        }

        // Buat pesanan baru
        foreach ($request->input('item') as $item) {
            $order = new Order();
            $order->pemesan = $request->input('pemesan');
            $order->id_menu = $item['menu'];
            $order->total = $total;
            $order->save();
        }

        // Redirect atau kembalikan response sesuai kebutuhan
        return redirect()->back()->with('success', 'Pesanan berhasil dibuat.');
    }

    function hasil()
    {
     $hasil=Order::all();
     foreach ($hasil as $order) {
        $order->menu = json_decode($order->menu);
    }
     return view('admin.orderan',compact('hasil'));
    }
}
