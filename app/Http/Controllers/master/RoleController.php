<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    function role()
    {
     $role= User::all();
     return view('master.role',compact('role'));
    }
    function update(Request $req)
    {
        $role=User::find($req->id);
        $role->name= $req->input('name');
        $role->role= $req->input('role');
        $role->email= $req->input('email');
        // $role->password= $req->input('password');

        $role->save();
        return redirect()->back()->with('succes','berhasil');
    }
}
