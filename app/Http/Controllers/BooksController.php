<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BooksController extends Controller
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
        $books = Books::where([
            ['judul', '!=', null],
            [function ($query) use ($request) {
                if ($term = $request->term) {
                    $query->orWhere('judul', 'LIKE', '%' . $term . '%')->orWhere('pengarang', 'LIKE', '%' . $term . '%')->get();
                }
            }]
        ])
            ->orderBy('kode_buku', 'asc')
            ->paginate(5);
        return view("users.books.books-index", compact('books'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function search(Request $request)
    {
        $search = $request->get('search');
        // $paginate = Mahasiswa::orderBy('Nim', 'asc')->paginate(3);
        $books = Books::where('judul', 'like', '%' . $search . '%')->orWhere('kode_buku', 'like', '%' . $search . '%')->paginate(5);
        return view('users.books.books-index', compact('books'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.books.books-create');
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
            'kode_buku' => 'required',
            'judul' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'stock' => 'required'
        ]);
        $request = Books::create([
            'kode_buku' => $request['kode_buku'],
            'judul' => $request['judul'],
            'pengarang' => $request['pengarang'],
            'penerbit' => $request['penerbit'],
            'stock' => $request['stock']
        ])->save();
        return redirect()->route('books.index');
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
    public function edit($kode_buku)
    {
        $books = Books::find($kode_buku);
        return view('users.books.books-edit', compact('books'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kode_buku)
    {
        $request->validate([
            'kode_buku' => 'required',
            'judul' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'stock' => 'required'
        ]);

        Books::find($kode_buku)->update($request->all());
        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kode_buku)
    {
        Books::find($kode_buku)->delete();
        return redirect()->route('books.index');
    }
}
