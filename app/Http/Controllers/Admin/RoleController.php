<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Role;
use App\Http\Requests\RoleFormRequest;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();

        return view('backend.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.roles.make');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleFormRequest $request)
    {
        $role = Role::where('name', $request->get('name'))->get();

        if (!$role->isEmpty()) {
            toastr()->success(trans('app.role-exist'), 'Role exist');

            return Redirect::route('admin.roles.index')->with('role-exist', trans('app.role-exist'));
        } else {
            Role::create(['name' => $request->get('name')]);
            toastr()->success(trans('app.create-role-success'), 'Create role success');

            return Redirect::route('admin.roles.index')->with('create-role-success', trans('app.create-role-success'));
        }
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
    public function destroy($id)
    {
        $roles = Role::findOrFail($id);
        $roles->delete();
        toastr()->success(trans('app.role-delete-success'), 'Role delete success');

        return Redirect::route('admin.roles.index', compact('roles'))->with('role-delete-success', trans('app.role-delete-success'));
    }
}
