<?php

namespace App\Http\Controllers\Backend;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRolesRequest;
use App\Http\Requests\Admin\UpdateRolesRequest;
use Validator;
use DB;

class RolesController extends Controller
{
    /**
     * Display a listing of Role.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        if (! Gate::allows('users_manage')) {
//            return abort(401);
//        }

        $roles = Role::all();

        return view('backend.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating new Role.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        if (! Gate::allows('users_manage')) {
//            return abort(401);
//        }
        $permissions = Permission::get();
        return view('backend.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created Role in storage.
     *
     * @param  \App\Http\Requests\StoreRolesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        if (! Gate::allows('users_manage')) {
//            return abort(401);
//        }
        // Build the validation constraint here:
        $rules  =   [
            'name'  =>  'required|alpha_spaces|unique:roles,name',
            'permission'  =>  'required'
        ];
        
        // Create a new validator instance
        
        $validator  =   Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('admin/roles/create')
                        ->withErrors($validator)
                        ->withInput()
                        ->with('error','Failed to save Item!');
        }
        $role = Role::create($request->except('permission'));
        $permissions = $request->input('permission') ? $request->input('permission') : [];
        $role->givePermissionTo($permissions);

        return redirect('admin/roles');
    }


    /**
     * Show the form for editing Role.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        if (! Gate::allows('users_manage')) {
//            return abort(401);
//        }
        $permissions = Permission::get();
        $role = Role::findOrFail($id);        
        return view('backend.roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update Role in storage.
     *
     * @param  \App\Http\Requests\UpdateRolesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        if (! Gate::allows('users_manage')) {
//            return abort(401);
//        }
        // Build the validation constraint here:
        $rules  =   [
            'name'  =>  'required|alpha_spaces|unique:roles,name',
            'permission'  =>  'required'
        ];
        
        // Create a new validator instance
        
        $validator  =   Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('admin/roles/'.$id.'/edit')
                        ->withErrors($validator)
                        ->withInput()
                        ->with('error','Failed to save Item!');
        }
        $role = Role::findOrFail($id);
        $role->update($request->except('permission'));
        $permissions = $request->input('permission') ? $request->input('permission') : [];
        $role->syncPermissions($permissions);

        return redirect('admin/roles')->with('success','Item updated successfully.');
    }


    /**
     * Remove Role from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        if (! Gate::allows('users_manage')) {
//            return abort(401);
//        }
        $roleCheck = DB::table('model_has_roles')->where('role_id', $id)->first();
        if(empty($roleCheck)){
            $role = Role::findOrFail($id);
            $role->delete();
            
            $feedback_data  =   [
                'status'    =>  'success',
                'message'    =>  'Data have successfully Deleted',
            ];
        }else{
            $feedback_data  =   [
                'status'    =>  'error',
                'message'    =>  'Failed to delete, User has assigned with this Role.',
            ];
        }
        echo json_encode($feedback_data);
    }

    /**
     * Delete all selected Role at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Role::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}