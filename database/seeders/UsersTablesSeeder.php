<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;


class UsersTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        DB::table('role_user')->truncate();
        $adminRole = Role::where('name', 'admin')->first();
        $userRole = Role::where('name', 'user')->first();
    $admin =User::create([
        'name'=>'Admin User',
        'email'=>'name@admin.com',
        'password'=>Hash::make('password')
    ]);
        $user =User::create([
            'name'=>' user',
            'email'=>'name@user.com',
            'password'=>Hash::make('password')
        ]);
        $admin ->roles()->attach($adminRole);
        $user ->roles()->attach($userRole);

    }
}
