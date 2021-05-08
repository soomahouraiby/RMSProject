<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $admin = Role::create([
            'name'=>'admin',
            'display_name'=>'admin',
            'description'=>'can do anything in the project'
        ]);

        $operation = Role::create([
            'name'=>'operation_Management',
            'display_name'=>'operation Management',
            'description'=>'can do anything in the project'
        ]);

        $pharmacies = Role::create([
            'name'=>'pharmacy_Management',
            'display_name'=>'pharmacies Management',
            'description'=>'can do anything in the project'
        ]);

        $pharmacovigilance = Role::create([
            'name'=>'pharmacovigilance_Management',
            'display_name'=>'pharmacovigilance Management',
            'description'=>'can do anything in the project'
        ]);

    }
}
