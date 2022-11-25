<?php

namespace Modules\Dictionary\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Dictionary\Entities\Dictionary;

class DictionaryDatabaseSeeder extends Seeder
{

    public function run()
    {
        Model::unguard();

        Dictionary::factory(100)->create();
    }
}
