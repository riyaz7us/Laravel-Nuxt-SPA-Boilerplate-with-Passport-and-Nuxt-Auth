<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_business = new Role();
        $role_business->id = 2;
        $role_business->name = 'admin';
        $role_business->save();

        $role_pending = new Role();
        $role_pending->id = 1;
        $role_pending->name = 'user';
        $role_pending->save();
    }
}
