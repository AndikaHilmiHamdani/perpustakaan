<?php

namespace App\Http\Controllers;

use App\Models\Books;
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
        $transaksi = Transaksi::with('users','status')->get();
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
        return view('users.transaksi.inputTransaksi', compact('user','books'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'trx_id' => 'required',
            'kode_buku' => 'required',
            'user_id' => 'required',
            'tanggal_pinjam' => 'required',
            'tanggal_kembali' => 'required',
            'status_id' => 'required'
        ]);
        $request = Transaksi::create([
            'trx_id' => $request['trx_id'],
            'kode_buku' => $request['kode_buku'],
            'user_id' => $request['user_id'],
            'tanggal_pinjam' => $request['tanggal_pinjam'],
            'tanggal_kembali' => $request['tanggal_kembali'],
            'status_id' => $request['status_id']
        ])->save();
        return redirect()->route('Transaksi.index');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
