<?php

namespace Database\Seeders;
use App\Models\User;

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Severus Snape',
            'email' => 'severus@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('severus123'),
            'admin' => 1,
            'approved_at' => now(),
            'usertype' => 'admin',
            'advisory' => 'Grade 12 - Wisdom'
        ]);
    }
}
