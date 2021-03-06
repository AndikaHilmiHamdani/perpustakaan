<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Books;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $users = User::where([
            ['name', '!=', Null],
            [function ($query) use ($request) {
                if (($term = $request->term)) {
                    $query->orWhere('name', 'LIKE', '%' . $term . '%')->orWhere('id', 'LIKE', '%' . $term . '%')->get();
                }
            }]
        ])
            ->orderBy('id', 'asc')
            ->paginate(5);

        return view("users.admin.user-index", compact('users'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        // $paginate = Mahasiswa::orderBy('Nim', 'asc')->paginate(3);
        $users = User::where('id', 'like', '%' . $search . '%')->orWhere('name', 'like', '%' . $search . '%')->paginate(5);
        return view('users.admin.user-index', compact('users'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.admin.user');
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
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        $request = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password'])
        ])->save();


        return redirect()->route('admin.index')->with('sukses', 'user berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::find($id);
        return view('users.admin.detail-user', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::find($id);
        return view('users.admin.edit-user', compact('users'));
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
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'email' => 'required'
        ]);
        User::find($id)->update($request->all());
        return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('admin.index')->with('sukses', 'data berhasil dihapus');
    }

    public function user()
    {
        $countbooks = '';
        $books = Books::select(Books::raw("kode_buku as id_buku"))->get();
        $countBooks = count($books);

        $users = User::get();
        $countUsers = count($users);

        $countTransaksi = '';
        $transaksi = Transaksi::select(Transaksi::raw("trx_id as trx_id"))->get();
        $countTransaksi = count($transaksi);
        return view("users.admin.dashboard", compact('countUsers', 'countBooks', 'countTransaksi'));
    }
}
