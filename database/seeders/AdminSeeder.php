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
            'email' => 'kennbassist@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('severus123'),
            'admin' => 1,
            'approved_at' => now(),
            'contact_no' => '0936-165-2609',
            'advisory' => 'Guidance Designate',
            'role' => 'editor'
        ]);
    }
}
