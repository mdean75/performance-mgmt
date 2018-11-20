<?php

use Illuminate\Database\Seeder;
use App\Department;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Department::updateOrCreate(['department_name' => 'Testing Department']);
        Department::updateOrCreate(['department_name' => 'Network Operations']);
        Department::updateOrCreate(['department_name' => 'Technical Support']);
        Department::updateOrCreate(['department_name' => 'Accounting']);
        Department::updateOrCreate(['department_name' => 'Compliance']);
    }
}
