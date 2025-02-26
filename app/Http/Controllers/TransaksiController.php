<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::orderBy('tanggal', 'desc')->get();
        return view('home', compact('transaksi'));
    }

    public function store(Request $request)
{
    $request->validate([
        'jenis' => 'required',
        'kategori' => 'required',
        'jumlah' => 'required|numeric',
        'tanggal' => 'required|date',
    ]);

    // Log data untuk debugging
    \Log::info($request->all());

    Transaksi::create($request->all());
    return redirect()->route('home')->with('success', 'Transaksi berhasil ditambahkan.');
}
}
