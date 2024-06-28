<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Order;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    function da_mas()
    {
        $orders=Order::all();
     return view('master.dashboard',compact('orders'));
    }

    // MENU
    function menu()
    {
     $menu= Menu::all();
     return view('master.menu.menu',compact('menu'));
    }

    function tambah()
    {

     return view('master.menu.tambah-menu');
    }
    function tambah_menu()
    {
        $tambah=new Menu([
            'item'=>request('item'),
            'price'=>request('price')
        ]);
        $tambah->save();
        return redirect()->back()->with('success','berhasil');
    }
    function update_menu(Request $req)
    {
        $menu=Menu::find($req->input('id'));
        $menu->item=$req->input('item');
        $menu->price=$req->input('price');
        $menu->save();
        return redirect()->back()->with('success','berhasil');

    }
    function delete_menu(Request $req)
    {
        $menu = $req->input('id');

        Menu::destroy($menu);

        return redirect()->back()->with('success', 'Item berhasil dihapus');
    }

}
