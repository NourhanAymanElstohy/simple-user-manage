<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Type::create(['name' => 'admin']);
        $agent = Type::create(['name' => 'agent']);
        $cashier = Type::create(['name' => 'cashier']);
    }
}
