<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\Admin\Entities\Admin;
use Modules\Admin\Http\Requests\Admin\StoreAdminRequest;
use Modules\Admin\Http\Requests\Admin\UpdateAdminPasswordRequest;
use Modules\Admin\Http\Requests\Admin\UpdateAdminRequest;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function index(){
        $admins= Admin::query()->sortable()->latest('id')->get();
        $roles=Role::query()->latest('id')->get();

        return view('admin::admin.index',compact('admins','roles'));
    }

    public function show($id){
        $admin = Admin::findOrFail($id);

        return view('admin::admin.show',compact('admin'));
    }

    public function create()
    {
        $roles=Role::query()->get();

        return view('admin::admin.create',compact('roles'));
    }

    public function store(StoreAdminRequest $request)
    {
        $admin =Admin::create([
            'name' => $request->name,
            'username' => $request->username,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'password' =>bcrypt($request->password),
            'status' => $request->status,
        ]);
        $admin->uploadImage($request);
        $role=$request->role;
        $admin->assignRole($role);

        return redirect()->route('admins.index');
    }

    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        $adminRole=$admin->roles->pluck('name')[0] ?? '';

        $roles=Role::query()->get();
        return view('admin::admin.edit',compact('admin','roles','adminRole'));
    }

    public function update(UpdateAdminRequest $request,$id)
    {
        $admin = Admin::findOrFail($id);
        $admin->update([
            'name' => $request->name,
            'username' => $request->username,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'status' => $request->status,
        ]);
        $role=$request->role;
        if($role){
            $admin->assignRole($role);
        }
        $admin->uploadImage($request);

        return redirect()->route('admins.index');
    }


    public function changePassword(UpdateAdminPasswordRequest $request,$id)
    {
        $admin=Admin::findOrFail($id);
        $admin->password = bcrypt($request->input('password'));
        $admin->save();

        return redirect()->route('admins.index')
            ->with('success','کلمه عبور شما با موفقیت به روزرسانی شد.');
    }

    public function destroy(Admin $admin){

        if($admin->id==1){
            return redirect()->route('admins.index')->with('success','قابل حذف نیست');
        }
        $admin->delete();
        $admin->deleteImage();

        return redirect()->route('admins.index');
    }
}
