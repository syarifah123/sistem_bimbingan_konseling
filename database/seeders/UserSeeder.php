<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superadmin = User::firstOrCreate(
            ['email' => 'superadmin@superadmin.com'],
            [
                'name' => 'Superadmin',
                'password' => Hash::make('superadmin'),
                'email_verified_at' => now(),
            ]
        );

        $superadmin->assignRole('superadmin');
    }
}
