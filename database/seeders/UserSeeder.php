<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Hash;
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
        $admin = new User();
        $admin->name = 'Admin';
        $admin->email = 'admin@mocischool.com';
        $admin->password = Hash::make('admiN123');
        $admin->role = 'admin';
        $admin->created_at = Carbon::now();
        $admin->updated_at = Carbon::now();
        $admin->save();

        $user = new User();
        $user->name = 'User';
        $user->email = 'user@mocischool.com';
        $user->password = Hash::make('useR123');
        $user->role = 'user';
        $user->created_at = Carbon::now();
        $user->updated_at = Carbon::now();
        $user->save();
    }
}
