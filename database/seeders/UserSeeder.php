<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'System Admin',
                'email' => 'admin@' . env('APP_DOMAIN', 'localhost'),
                'password' => Hash::make('$Password;'),
            ]
        ];

        foreach ($users as $user) {
            $exist = User::where('email', $user['email'])->count();

            if (!$exist) {
                User::create($user);
            }
        }
    }
}
