<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use App\Models\Order;
use App\Models\Listquest;


class jokiController extends Controller
{
    public function create()
    {
        $this->authorize('insert');
        $joki = Pelanggan::get();
        $orders = Order::with('listquest')->get(); // Mengambil semua data order beserta listquest
        return view('pelanggan.create')->with(['pelanggan' => $joki, 'orders' => $orders]);
    }


    public function insert(Request $r)
    {

        $pelanggan = new Pelanggan;
        $pelanggan->email = $r->email;
        $pelanggan->password = $r->password;
        $pelanggan->sosmed = $r->sosmed;
        $pelanggan->order_id = $r->order_id; // Menyimpan order_id
        $pelanggan->save();

        return redirect()->route("joki")->with("success","ok");
    }

    public function edit(Request $r)
    {
        $pelanggan = Pelanggan::find($r->id);
        $orders = Order::with('listquest')->get(); // Mengambil semua data order beserta listquest
        return view('pelanggan.edit', compact('pelanggan','orders'));
    }

    public function update(Request $r)
    {
        $pelanggan = Pelanggan::find($r->id);
        $pelanggan->email = $r->email;
        $pelanggan->password = $r->password;
        $pelanggan->sosmed = $r->sosmed;
        $pelanggan->is_verif = $r->is_verif;
        $pelanggan->order_id = $r->order_id;
        $pelanggan->save();

        return redirect()->route("joki")->with("success","ok");
    }

    public function delete(Request $r)
    {
        $pelanggan = Pelanggan::find($r->id);
        $pelanggan->delete();
        return redirect()->route("joki")->with("success","ok");
    }

    // untuk nampilin table order
    public function index()
    {
        $pelanggan = Pelanggan::all(); // Ambil semua data pelanggan
        $orders = Order::all(); // Ambil semua data order
        return view('joki', compact('pelanggan', 'orders')); // Kirim data pelanggan dan order ke view
    }

}
