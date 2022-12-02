<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Permission;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = Permission::all();
        $user = User::create([
            'name' => 'super_admin',
            'email' => 'super_admin@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        $user->attachRole('super_admin');
        $user->syncPermissions($permission);
    }
}
