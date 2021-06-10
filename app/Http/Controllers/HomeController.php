<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Transaksi;
use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('home');
    }
    public function kajur()
    {
        return view('kajur');
    }

    public function anggota()
    {
        $id = Auth::User()->id;
        $transaksi = Transaksi::with('users', 'status')->where('user_id', '=', $id)->get();
        // dd($transaksi);
        return view('transaksi-saya', compact('transaksi'));
    }
}
