<?php

namespace Database\Seeders;

use App\Models\User;
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
        $data = [
            [
                'name' => 'alwi',
                'username' => 'admin',
                'email' => 'admin@admin.com',
                'notelp' => '08921381312',
                'jenis_kelamin' => 'L',
                'role' => 'admin',
                'alamat' => 'sda',
                'is_active' => '1',
                'password' => Hash::make(12345),
            ],
            [
                'name' => 'user',
                'username' => 'user',
                'email' => 'user@user.com',
                'notelp' => '08921381312',
                'jenis_kelamin' => 'L',
                'role' => 'user',
                'alamat' => 'sda',
                'is_active' => '1',
                'password' => Hash::make(12345),
            ],
        ];
        collect($data)->each(fn($user) => User::create($user));
    }
}
