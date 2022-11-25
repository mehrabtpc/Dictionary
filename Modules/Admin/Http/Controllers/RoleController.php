<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Role;
use Spatie\Permission\Models\Permission;
use Modules\Admin\Http\Requests\Role\StoreRoleRequest;
use Modules\Admin\Http\Requests\Role\UpdateRoleRequest;

class RoleController extends Controller
{
    public function index()
    {
        $roles=Role::query()->sortable()->get();
        $permissions=Permission::query()->get();

        return view('admin::role.index',compact('roles','permissions'));
    }

    public function create()
    {
        $permissions=Permission::query()->get();

        return view('admin::role.create',compact('permissions'));
    }
    public function store(StoreRoleRequest $request)
    {
        $role=Role::create([
           'name' => $request->name,
            'guard_name'=> 'web'
        ]);

        //permissions for this role
        $permissions = $request->permissions;

        foreach ($permissions as $permission){
            $role->givePermissionTo($permission);
        }

        return redirect()->route('roles.index');
    }

    public function show($id)
    {
        $role = Role::findOrFail($id);
        $permissions=Permission::query()->get();

        return view('admin::role.show',compact('role','permissions'));
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permissions=Permission::query()->get();

        return view('admin::role.edit',compact('role','permissions'));
    }

    public function update(UpdateRoleRequest $request, $id)
    {
        $role = Role::findOrFail($id);
        $role->update([
            'name' => $request->name,
        ]);

        return redirect()->route('roles.index');
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->route('roles.index');
    }
}
