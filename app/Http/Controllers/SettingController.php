<?php

namespace App\Http\Controllers;

use DB;
use Alert;
use App\Models\Category;
use App\Models\Discount;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('menu');
    }

    public function index()
    {
        $diskon = Discount::all();
        $members = DB::table('vUser')->get();
        $categories = Category::all();

        return view('setting', compact('diskon', 'members', 'categories'));
    }

    public function store_discount(Request $request)
    {
        $this->validate($request, [
            'kode' => 'required|size:8|unique:discounts,kode',
            'diskon' => 'required',
        ]);

        $discount = new Discount;
        $discount->kode = $request->kode;
        $discount->diskon = $request->diskon;
        $discount->save();

        Alert::toast('Diskon Berhasil Dibuat','success');
        return redirect()->back();
    }

    public function store_category(Request $request)
    {
        $this->validate($request, [
            'kategori' => 'required|min:4',
            'icon' => 'required',
        ]);

        $discount = new Category;
        $discount->nama_kategori = $request->kategori;
        $discount->icon = $request->icon;
        $discount->save();

        Alert::toast('Kategori Berhasil Dibuat','success');
        return redirect()->back();
    }

    public function store_member(Request $request)
    {
        $this->validate($request, [
            'level' => 'required',
            'username' => 'required|max:20|string|unique:users,username',
            'email' => 'required|string|email|max:40',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required'
        ]);

        User::create([
            'id_level' => $request->level,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        Alert::toast('Member Baru Ditambahkan','success');
        return redirect()->back();
    }

    public function update_discount(Request $request, $id)
    {
        $this->validate($request, [
            'kode' => 'required|size:8',
            'diskon' => 'required',
        ]);

        $discount = Discount::find($id);
        $discount->kode = $request->kode;
        $discount->diskon = $request->diskon;
        $discount->save();

        Alert::toast('Diskon Berhasil Diubah','success');
        return redirect()->back();
    }

    public function update_category(Request $request, $id)
    {
        $this->validate($request, [
            'kategori' => 'required|min:4',
            'icon' => 'required',
        ]);

        $discount = Category::find($id);
        $discount->nama_kategori = $request->kategori;
        $discount->icon = $request->icon;
        $discount->save();

        Alert::toast('Kategori Berhasil Diubah','success');
        return redirect()->back();
    }

    public function update_member(Request $request, $id)
    {
        $this->validate($request, [
            'level' => 'required',
            'username' => 'required|max:20|string',
            'email' => 'required|string|email|max:40',
        ]);

        User::where('id', $id)->update([
            'id_level' => $request->level,
            'username' => $request->username,
            'email' => $request->email,
        ]);

        Alert::toast('Member Berhasil Diedit','success');
        return redirect()->back();
    }

    public function destroy_discount($id)
    {
        Discount::find($id)->delete();
        Alert::toast('Diskon Berhasil Dihapus','success');

        return redirect()->back();
    }

    public function destroy_category($id)
    {
        Category::find($id)->delete();
        Alert::toast('Kategori Berhasil Dihapus','success');

        return redirect()->back();
    }

    public function destroy_member($id)
    {
        User::find($id)->delete();
        Alert::toast('Member Berhasil Dihapus','success');

        return redirect()->back();
    }
}
