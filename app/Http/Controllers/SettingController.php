<?php

namespace App\Http\Controllers;

use DB;
use Alert;
use App\Models\Category;
use App\Models\Discount;
use Illuminate\Http\Request;

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

    public function store(Request $request)
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

    public function update(Request $request, $id)
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

    public function destroy($id)
    {
        Discount::find($id)->delete();
        Alert::toast('Diskon Berhasil Dihapus','success');

        return redirect()->back();
    }
}
