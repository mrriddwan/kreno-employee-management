<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employee_roles')->insert([
            [
                'employee_id' => 1,
                'department_role_id' => 1
            ],
            [
                'employee_id' => 2,
                'department_role_id' => 4
            ],
            [
                'employee_id' => 3,
                'department_role_id' => 3
            ],
            [
                'employee_id' => 4,
                'department_role_id' => 2
            ],
        ]);
    }
}
