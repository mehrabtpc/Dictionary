<?php

namespace Modules\Admin\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class RoleTableSeeder extends Seeder
{

    public function run()
    {
        Model::unguard();

        $role = Role::query()->create([
            'name'=>'super-admin',
            'guard_name'=>'web',
        ]);

        $role = Role::query()->create([
            'name'=>'admin',
            'guard_name'=>'web',
        ]);

    }
}
