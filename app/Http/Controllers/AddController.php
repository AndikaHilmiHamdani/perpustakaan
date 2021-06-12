<?php

namespace App\Http\Controllers;

use App\Models\ModelRoles;
use App\Models\Role;
use Illuminate\Http\Request;

class AddController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $addAdmin = ModelRoles::where([
            ['model_id', '!=', Null],
            [function ($query) use ($request) {
                if (($term = $request->term)) {
                    $query->orWhere('model_id', 'LIKE', '%' . $term . '%')->orWhere('role_id', 'LIKE', '%' . $term . '%')->get();
                }
            }]
        ])
            ->orderBy('model_id', 'asc')
            ->paginate(5);
        return view("users.admin.admin", compact('addAdmin'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
    public function edit($model_id)
    {
        $role = Role::all();
        $addAdmin = ModelRoles::find($model_id);
        return view('users.admin.edit-admin', compact('addAdmin','role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $model_id)
    {
        $request->validate([
            'role_id' => 'required',
        ]);
        ModelRoles::find($model_id)->update($request->all());
        return redirect()->route('add-admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
