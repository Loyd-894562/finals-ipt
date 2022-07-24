<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;



use Illuminate\Http\Request;

class RoleController extends Controller
{
  
    function __construct()
    {
         $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
         $this->middleware('permission:role-create', ['only' => ['create','store']]);
         $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $roles = Role::orderBy('id','desc')->get();
        return view('roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions=Permission::all();
        return view('roles.create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|unique:roles,name',
                "permissions"=>'required'
            ]);
           
            // echo "<pre>";
            // print_r($request->all());
            // die();
            $role = Role::create([
                'name'=> $request['name'],
            ]);

            $role->syncPermissions($request->input('permissions'));

            session()->flash('success',__('Role created successfully'));

            return redirect()->route('roles.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $role = Role::find($id);
        $permissions = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();

        // return $rolePermissions;

        return view('roles.edit',compact('role','permissions','rolePermissions'));
  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $role=Role::findOrFail($id);
            $request->validate([
                'name' => 'required|unique:roles,name,'.$id,
                "permissions"=>'required'
            ]);
            $role->update([
                'name'=>$request['name'],
            ]);
            $role->syncPermissions($request->input('permissions'));
            session()->flash('success',__('Role successfully Updated !!'));
            return redirect()->back();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $role = Role::findOrFail($id);
            // $role->permissions()->delete();
            $role->delete();
            session()->flash('success',__('Data deleted successfully'));
            return redirect()->route('roles.index');

        } catch (\Throwable $th) {
            session()->flash('failed',__('Something Went wrong !!!'));
            return redirect()->route('roles.index');
        }
    }
}
