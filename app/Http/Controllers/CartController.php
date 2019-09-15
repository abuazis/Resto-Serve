<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Check;
use Auth;
use Cart;

class CartController extends Controller
{
    public function store($id)
    {
        $menu = Menu::find($id);
        $user = Auth::id();
        Cart::session($user)->add([
            'id' => $menu->id,
            'name' => $menu->nama_menu,
            'price' => $menu->harga,
            'quantity' => 1,
            'attributes' => [
                'picture' => $menu->gambar,
            ]
        ]);

        return redirect()->back();
    }

    public function remove($id)
    {
        $user = Auth::id();
        Cart::session($user)->remove($id);

        return redirect()->back();
    }
}
