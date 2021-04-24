<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleTableSeeder::class);
        $this->call(ProgramTableSeeder::class);
        $this->call(LiveSessionTableSeeder::class);
        $this->call(IndustrialVisitTableSeeder::class);
        $this->call(IcpTableSeeder::class);        
        // \App\Models\User::factory(10)->create();
    }
}
