<?php

namespace App\Http\Controllers\Backend;

use App\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUsersRequest;
use App\Http\Requests\Admin\UpdateUsersRequest;
use Spatie\Permission\Traits\HasRoles;
use Validator;
use DB;
use Image;

class UsersController extends Controller
{
    /**
     * Display a listing of User.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        if (! Gate::allows('users_manage')) {
//            return abort(401);
//        }

        $users = User::all();

        return view('backend.users.index', compact('users'));
    }

    /**
     * Show the form for creating new User.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        if (! Gate::allows('users_manage')) {
//            return abort(401);
//        }
        $roles = Role::get();

        return view('backend.users.create', compact('roles'));
    }

    /**
     * Store a newly created User in storage.
     *
     * @param  \App\Http\Requests\StoreUsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        if (! Gate::allows('users_manage')) {
//            return abort(401);
//        }
        $rules  =   [
            'name'      =>  'required|alpha_spaces|unique:users,name',
            'email'     =>  'required|unique:users,email',
            'password'  =>  'required',
            'roles'     =>  'required'
        ];
        
        // Create a new validator instance
        
        $validator      =   Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('admin/users/create')
                        ->withErrors($validator)
                        ->withInput()
                        ->with('error','Failed to save Item!');
        }
        
        /*
        * ---------------------------------------------------------------------
        * Profile image upload area
        * for image resizing we use: Intervention Image Package
        * ---------------------------------------------------------------------
        */
        if($request->hasFile('profile_image')) {
            $profileImageChange     =       true;
            $image = $request->file('profile_image');
            // file re name
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            // resize file destination path
            $destinationPath = public_path('uploads\resize_images');
            // actual path for the file
            $img = Image::make($request->file('profile_image')->getRealPath());
            $img->resize(100, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $image_name);
            $destinationPath = public_path('uploads\profile_images');

            // Image upload method
            $image->move($destinationPath, $image_name);
            
            // Delete Existing Image
            $main_image_path    =   'uploads\profile_images';
            $resize_image_path    =   'uploads\resize_images';
            if(!empty($user->image_path)){

                unlink(public_path($main_image_path.'\\'.$user->image_path));

                unlink(public_path($resize_image_path.'\\'.$user->image_path));
            }
			$users_input_array   =  [
				'name'          =>  $request->name,
				'email'         =>  $request->email,
				'password'      =>  $request->password,
				'image_path'    =>  $image_name,
			];
        }
                
        $user->update((($profileImageChange) ? $users_input_array   :   $request->all()));
        $roles  =   $request->input('roles') ? $request->input('roles') : [];
        $user->syncRoles($roles);

        return redirect('admin/users');
    }


    /**
     * Show the form for editing User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        
//        if (! Gate::allows('users_manage')) {
//            return abort(401);
//        }
        $roles = Role::get();

        $user = User::findOrFail($id);
        $check  =   $user->roles()->pluck('name', 'name')->all();
        
        return view('backend.users.edit', compact('user', 'roles'));
    }

    /**
     * Update User in storage.
     *
     * @param  \App\Http\Requests\UpdateUsersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsersRequest $request, $id)
    {
//        if (! Gate::allows('users_manage')) {
//            return abort(401);
//        }
        $user                   =   User::findOrFail($id);
        
        // Defalult value for $profileImageChange
        $profileImageChange     =   false;
        
        $rules          =   [
            'name'      =>  'required|alpha_spaces|unique:users,name,'.$id,
            'email'     =>  'required|unique:users,email,'.$id,
            'roles'     =>  'required'
        ];
        
        // Create a new validator instance
        
        $validator  =   Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('admin/users/'.$id.'/edit')
                        ->withErrors($validator)
                        ->withInput()
                        ->with('error','Failed to Update Item!');
        }
        /*
        * ---------------------------------------------------------------------
        * Profile image upload area
        * for image resizing we use: Intervention Image Package
        * ---------------------------------------------------------------------
        */
        if($request->hasFile('profile_image')) {
            $profileImageChange     =       true;
            $image = $request->file('profile_image');
            // file re name
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            // resize file destination path
            $destinationPath = public_path('uploads\resize_images');
            // actual path for the file
            $img = Image::make($request->file('profile_image')->getRealPath());
            $img->resize(100, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $image_name);
            $destinationPath = public_path('uploads\profile_images');

            // Image upload method
            $image->move($destinationPath, $image_name);
            
            // Delete Existing Image
            $main_image_path    =   'uploads\profile_images';
            $resize_image_path    =   'uploads\resize_images';
            if(!empty($user->image_path)){

                unlink(public_path($main_image_path.'\\'.$user->image_path));

                unlink(public_path($resize_image_path.'\\'.$user->image_path));
            }
			$users_input_array   =  [
				'name'          =>  $request->name,
				'email'         =>  $request->email,
				'password'      =>  $request->password,
				'image_path'    =>  $image_name,
			];
        }
                
        $user->update((($profileImageChange) ? $users_input_array   :   $request->all()));
        $roles  =   $request->input('roles') ? $request->input('roles') : [];
        $user->syncRoles($roles);

        return redirect('admin/users');
    }

    /**
     * Remove User from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
//        if (! Gate::allows('users_manage')) {
//            return abort(401);
//        }

        $roleCheck = DB::table('model_has_roles')->where('model_id', $id)->first();

        if (!empty($roleCheck)) {
            $roleCheck = DB::table('model_has_roles')->where('model_id', '=', $id)->delete();
        }
        $user = User::findOrFail($id);
        $user->delete();

        $feedback_data = [
            'status' => 'success',
            'message' => 'Data have successfully Deleted',
        ];
        echo json_encode($feedback_data);
    }

    /**
     * Delete all selected User at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = User::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
