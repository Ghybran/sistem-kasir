<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Order;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    // HALAMAN


            // menu dashboard
    function dashboard()
    {
        $men=Menu::all();
     return view('admin/dashboard',compact('men'));
    }
            // menambah menu

    function tambah()
    {
        return view('admin.menu.tambah_menu');
    }
    function update()
    {
        $men=Menu::all();
        return view('admin.menu.update',compact('men'));
    }





    // SISTEM

    function insert_menu()
    {
        $add= new Menu([
        'item'=>request('item'),
        'price'=>request('price'),
        ]);
        $add->save();
        return redirect()->back()->with('succes','berhasil');
    }

   function update_menu(Request $req)
   {
        $men=Menu::find($req->input('id'));
        $men->item = $req->input('item');
        $men->price = $req->input('price');

        $men->save();
        return redirect()->back()->with('succes','berhasil');
   }

















    public function order(Request $request)
    {
        // Mendapatkan pesanan dari session
        $orders = collect(session('orders', []));

        // Jika ada pesanan baru yang ditambahkan
        if ($request->has('orderItem')) {
            $parts = explode('-', $request->input('orderItem'));
            if (count($parts) === 2) {
                [$item, $price] = $parts;
                $orders->push(['item' => $item, 'price' => (int) $price]);
            }
        }

        // Mendapatkan total harga pesanan
        $totalPrice = $orders->sum('price');

        // Jika pesanan di-submit
        if ($request->has('submitOrder')) {
            $request->validate([
                'pemesan' => 'required',
            ]);

            $pemesan = $request->input('pemesan');

            // Simpan pesanan ke database
            Order::create([
                'pemesan' => $pemesan,
                'menu' => json_encode($orders), // Simpan menu sebagai JSON
                'total' => $totalPrice,
            ]);

            // Bersihkan pesanan dari session
            session()->forget('orders');

            return back()->with('message', 'Order placed successfully!');
        }

        // Simpan pesanan dalam session
        session(['orders' => $orders]);

        return back()
            ->with('orderSummary', $orders)
            ->with('totalPrice', $totalPrice);
    }

}
