<?php

namespace App\Http\Controllers;

Use Alert;
use App\Helpers\Check;
use App\Category;
use App\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $categoryModel = new Category;
        $categoryModel->setConnection(Check::connection());
        $categories = $categoryModel->get();
        $types = $categoryModel->get();

        $menuModel = new Menu;
        $menuModel->setConnection(Check::connection());

        if($request->has('cari')) {
            $menus = $menuModel->where('nama_menu', 'LIKE', '%'.$request->cari.'%')->paginate(8);
        } else {
            $menus = $menuModel->paginate(8);
        }

        return view('menu', compact('menus', 'categories', 'types'));
    }

    public function category($name)
    {
        $categoryModel = new Category;
        $categoryModel->setConnection(Check::connection());
        $categories = $categoryModel->get();
        $types = $categoryModel->get();

        $menuModel = new Menu;
        $menuModel->setConnection(Check::connection());
        $kategori = $categoryModel->where('nama_kategori', $name)->first();
        $menus = $menuModel->where('id_kategori', $kategori->id)->paginate(8);

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
        }

        $menuModel->save();
        Alert::toast('Menu Ditambahkan','success');

        return redirect('/menu')->with('sukses', 'Berhasil Menambah Menu');
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

        $menuModel = Menu::find($id);
        $menuModel->setConnection(Check::connection());

        $menuModel->id_kategori = $request->kategori;
        $menuModel->nama_menu = $request->nama;
        $menuModel->harga = $request->harga;
        $menuModel->status_menu = $request->status;
        $menuModel->deskripsi = $request->deskripsi;

        if($request->has('gambar')) {
            $request->file('gambar')->move(public_path().'/uploads', $request->file('gambar')->getClientOriginalName());
            $menuModel->gambar = $request->file('gambar')->getClientOriginalName();
        }

        $menuModel->save();
        Alert::toast('Menu Diedit','success');

        return redirect('/menu')->with('sukses', 'Berhasil Mengedit Menu');
    }

    public function remove($id)
    {
        $menuModel = new Menu;
        $menuModel->setConnection(Check::connection());
        $menuModel->where('id', $id)->get();

        Storage::delete('uploads/'.$menuModel->gambar);
        $menuModel->where('id', $id)->delete();
        Alert::toast('Menu Dihapus','success');

        return redirect('/menu')->with('Sukses', 'Berhasil Menghapus Menu');
    }
}
