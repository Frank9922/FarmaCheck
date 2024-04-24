<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {   User::create([
        'name' => 'Franco Leiva',
        'email' => 'francoleiva990@gmail.com',
        'password' => Hash::make('password')
    ]);

        $this->call(FarmacoSeeder::class);
        $this->call(CompatibilitySeeder::class);
    }
}
