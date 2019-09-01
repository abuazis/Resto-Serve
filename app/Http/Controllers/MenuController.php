<?php

namespace App\Http\Controllers;

use App\Helpers\Check;
use App\Menu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menuModel = new Menu;
        $menuModel->setConnection(Check::connection());
        $menus = $menuModel->get();

        return view('menu', compact('menus'));
    }
}
