<?php

namespace Modules\Admin\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleHasPermissionTableSeeder extends Seeder
{

    public function run()
    {
//        Model::unguard();

        $role = Role::query()->get();
        $permissions = Permission::query()->get();

        $role[0]->givePermissionTo($permissions);

        $userPermissions = [
            //userPermission
        ];

        $role[1]->givePermissionTo($userPermissions);

    }
}
