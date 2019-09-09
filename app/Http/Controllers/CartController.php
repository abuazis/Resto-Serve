<?php

namespace App\Http\Controllers;

use App\Menu;
use Check;
use Auth;
use Cart;

class CartController extends Controller
{
    public function store($id)
    {
        $menu = new Menu;
        $menu->setConnection(Check::connection());
        
    }
}
