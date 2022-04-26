<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super_admin =   User::create([
            'name' => 'Super_Admin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('123123123'),
        ]);

        $super_admin->attachRole('super_admin');
    }
}
