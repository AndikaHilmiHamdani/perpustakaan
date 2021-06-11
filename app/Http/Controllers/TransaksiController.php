<?php

namespace App\Http\Controllers;


use App\Models\Books;
use App\Models\status;
use App\Models\User;
use App\Models\Transaksi;

use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::with('users', 'status')->get();
        $paginate = Transaksi::orderBy('trx_id', 'asc')->paginate(5);

        return view('users.transaksi.transaksi', compact('transaksi'), compact('paginate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        $books = Books::all();
        $dateNow = date("Y-m-d");
        $nextN = mktime(0, 0, 0, date("m"), date("d") + 4, date("Y"));
        $fiveDays = date("Y-m-d", $nextN);
        // dd($fiveDays);
        return view('users.transaksi.inputTransaksi', compact('user', 'books', 'dateNow', 'fiveDays'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $idbuku = $request->kode_buku;
        $buku = Books::find($idbuku);
        $stok = $buku->stock;
        $sumStok = $stok - 1;
        $buku->stock = $sumStok;
        $buku->save();

        $request->validate([
            'kode_buku' => 'required',
            'user_id' => 'required',
            'tanggal_pinjam' => 'required',
            'tanggal_kembali' => 'required',
            'status_id' => 'required'
        ]);
        Transaksi::create($request->all());
        return redirect()->route('anggota.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($trx_id)
    {
        $user = User::all();
        $books = Books::all();
        $status = status::all();
        $transaksi = Transaksi::find($trx_id);
        return view('users.transaksi.transaksi-edit', compact('user', 'books', 'status', 'transaksi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $trx_id)
    {
        $request->validate([
            'kode_buku' => 'required',
            'user_id' => 'required',
            'tanggal_pinjam' => 'required',
            'tanggal_kembali' => 'required',
            'status_id' => 'required'
        ]);
        Transaksi::find($trx_id)->update($request->all());
        return redirect()->route('Transaksi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($trx_id)
    {
        Transaksi::find($trx_id)->delete();
        return redirect()->route('Transaksi.index')->with('sukses', 'data berhasil dihapus');
    }
}
