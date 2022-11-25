<?php

namespace Modules\Admin\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Admin\Entities\Admin;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminTableSeeder extends Seeder
{

    public function run()
    {
        Model::unguard();

        $admin = Admin::query()->create([
            'name'=>'Admin',
            'username'=>'Admin',
            'mobile'=>'09112223344',
            'email'=>'asdf@gmail.com',
            'password'=>bcrypt('12345678'),
        ]);
        $role = Role::query()->where('name','super-admin')->get();
        $admin->assignRole($role);

    }
}
