<?php

namespace App\Http\Controllers;

Use Alert;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('menu');
    }

    public function index(Request $request)
    {
        $categories = Category::all();
        $types = Category::all();

        if($request->has('cari')) {
            $menus = Menu::where('nama_menu', 'LIKE', '%'.$request->cari.'%')->paginate(8);
        } else {
            $menus = Menu::paginate(8);
        }

        return view('menu', compact('menus', 'categories', 'types'));
    }

    public function category($name)
    {
        $categories = Category::all();
        $types = Category::all();

        $kategori = Category::where('nama_kategori', $name)->first();
        $menus = Menu::where('id_kategori', $kategori->id)->paginate(8);

        return view('menu', compact('menus', 'categories', 'types'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'kategori' => 'required',
            'nama' => 'required|min:3|max:25',
            'harga' => 'required|integer|min:3',
            'status' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'mimes:png,jpg,jpeg,svg',
        ]);

        $menu = new Menu;

        $menu->id_kategori = $request->kategori;
        $menu->nama_menu = $request->nama;
        $menu->harga = $request->harga;
        $menu->status_menu = $request->status;
        $menu->deskripsi = $request->deskripsi;

        if($request->has('gambar')) {
            $request->file('gambar')->move(public_path().'/uploads', $request->file('gambar')->getClientOriginalName());
            $menu->gambar = $request->file('gambar')->getClientOriginalName();
        }

        $menu->save();
        Alert::toast('Menu Berhasil Ditambahkan','success');

        return redirect('/menu');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'kategori' => 'required',
            'nama' => 'required|min:3|max:25',
            'harga' => 'required|integer|min:3',
            'status' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'mimes:png,jpg,jpeg,svg',
        ]);

        $menu = Menu::find($id);

        $menu->id_kategori = $request->kategori;
        $menu->nama_menu = $request->nama;
        $menu->harga = $request->harga;
        $menu->status_menu = $request->status;
        $menu->deskripsi = $request->deskripsi;

        if($request->has('gambar')) {
            $request->file('gambar')->move(public_path().'/uploads', $request->file('gambar')->getClientOriginalName());
            $menu->gambar = $request->file('gambar')->getClientOriginalName();
        }

        $menu->save();
        Alert::toast('Menu Berhasil Diedit','success');

        return redirect('/menu');
    }

    public function destroy($id)
    {
        $menuImage = Menu::where('id', $id)->first();
        Storage::disk('local')->delete('public/uploads/'.$menuImage->gambar);

        Menu::find($id)->delete();
        Alert::toast('Menu Berhasil Dihapus','success');

        return redirect('/menu');
    }
}
