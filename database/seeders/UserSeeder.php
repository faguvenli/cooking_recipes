<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
           'name' => 'Altay Güvenli',
           'email' => 'admin@admin.com',
           'password' => bcrypt('password'),
            'is_active' => true,
            'is_admin' => true
        ]);
    }
}
