<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super_admin_role =    Role::create([
            'name' => 'super_admin',
            'display_name' => 'super_admin',
            'description' => 'can do any thing',
        ]);
        $admin_role =    Role::create([
            'name' => 'admin',
            'display_name' => 'admin',
            'description' => ' do some thing',
        ]);
        $user_role =    Role::create([
            'name' => 'user',
            'display_name' => 'user',
            'description' => ' do limited things',
        ]);
    }
}
