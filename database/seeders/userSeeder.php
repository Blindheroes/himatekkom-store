<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //make 10 users with faker and 1 admin user
        \App\Models\User::factory(10)->create();
        \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('1234'),
            'is_admin' => true,
        ]);
    }
}
