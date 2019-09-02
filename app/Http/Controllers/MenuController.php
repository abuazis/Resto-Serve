<?php

namespace App\Http\Controllers;

use App\Helpers\Check;
use App\Category;
use App\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $categoryModel = new Category;
        $categoryModel->setConnection(Check::connection());
        $categories = $categoryModel->get();

        $menuModel = new Menu;
        $menuModel->setConnection(Check::connection());
        $menus = $menuModel->get();

        return view('menu', compact('menus', 'categories'));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'kategori' => 'required',
            'nama' => 'required|min:3|max:25',
            'harga' => 'required|integer|min:3',
            'status' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'mimes:png,jpg,jpeg,svg',
        ]);

        $menuModel = new Menu;

        $menuModel->setConnection(Check::connection());
        $menuModel->id_kategori = $request->kategori;
        $menuModel->nama_menu = $request->nama;
        $menuModel->harga = $request->harga;
        $menuModel->status_menu = $request->status;
        $menuModel->deskripsi = $request->deskripsi;
        if($request->has('gambar')) {
            $request->file('gambar')->move(public_path().'/uploads', $request->file('gambar')->getClientOriginalName());
            $menuModel->gambar = $request->file('gambar')->getClientOriginalName();
            $menuModel->save();
        }

        return redirect('/menu')->with('sukses', 'Berhasil Menambah Menu');
    }
}
