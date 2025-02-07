<?php

namespace Database\Seeders;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'username' => 'gotama',
            'email' => 'admin@gmail.com',
            'no_hp' => '08987654321',
            'address' => 'kabupaten madrid',
            'jurusan' => 'Tata Boga',
            'status' => 1,
            'password' => bcrypt('1234'),
            'role' => 'Admin',
        ]);

        // User::factory(30)->create();
    }
}