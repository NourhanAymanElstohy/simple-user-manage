<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::create([
            'name' => "Sys admin",
            'username' => "admin",
            'email' => 'admin@gmail.com',
            'password' => '$2y$10$irD5U0lrz.fuUrfUoglWsOTmxXO2AJVqDKDNXCqpc53jm7hFAFrjS', //12345678
            'phone' => '01061638792',
            'status' => 1,
            'type_id' => 1
        ]);
    }
}
