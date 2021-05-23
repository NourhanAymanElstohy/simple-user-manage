<?php

namespace Database\Seeders;

use App\Models\Accessright;
use App\Models\Type;
use Illuminate\Database\Seeder;

class AccessrightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $a1 = Accessright::create(['access_title' => 'create new admin']);
        $a2 = Accessright::create(['access_title' => 'edit admin data']);
        $a3 = Accessright::create(['access_title' => 'edit agent data']);
        $a4 = Accessright::create(['access_title' => 'edit cashier data']);
        $a5 = Accessright::create(['access_title' => 'delete admin']);
        $a6 = Accessright::create(['access_title' => 'delete agent']);
        $a7 = Accessright::create(['access_title' => 'delete cashier']);

        $adminType = Type::where('name', 'admin')->first();
        $agentType = Type::where('name', 'agent')->first();
        $cashierType = Type::where('name', 'cashier')->first();

        $adminType->accessrights()->attach([$a1->id, $a2->id, $a3->id, $a4->id, $a5->id, $a6->id, $a7->id]);
        $agentType->accessrights()->attach([$a4->id, $a7->id]);
        $cashierType->accessrights()->attach([$a3->id, $a6->id]);
    }
}
