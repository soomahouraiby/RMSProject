<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name'=>'المدير العام',
            'email'=>'admin@gmail.com',
            'phone'=>773773211,
            'district'=>'الامانة',
            'address'=>'الحي السياسي',
            'password'=>bcrypt('admin')]);

        $admin->attachRole('admin');

        $operation = User::create([
            'name'=>'مدير العمليات',
            'email'=>'admin1@gmail.com',
            'phone'=>773773211,
            'district'=>'الامانة',
            'address'=>'الحي السياسي',
            'password'=>bcrypt('admin')]);

        $operation->attachRole('operation_Management');

        $pharmacy = User::create([
            'name'=>'مدير الصيدلة',
            'email'=>'admin2@gmail.com',
            'phone'=>773773211,
            'district'=>'الامانة',
            'address'=>'الحي السياسي',
            'password'=>bcrypt('admin')]);

        $pharmacy->attachRole('pharmacy_Management');

        $pharmacovigilance = User::create([
            'name'=>'مدير التيقظ الدوائي',
            'email'=>'admin3@gmail.com',
            'phone'=>773773211,
            'district'=>'الامانة',
            'address'=>'الحي السياسي',
            'password'=>bcrypt('admin')]);

        $pharmacovigilance->attachRole('pharmacovigilance_Management');
    }
}
