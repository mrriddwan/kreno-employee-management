<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('department_roles')->insert([
            [
                'id' => 1,
                'department_id' => 1,
                'name' => 'Leader'
            ],
            [
                'id' => 2,
                'department_id' => 1,
                'name' => 'Assistant'
            ],
            [
                'id' => 3,
                'department_id' => 2,
                'name' => 'Leader'
            ],
            [
                'id' => 4,
                'department_id' => 2,
                'name' => 'Assistant'
            ],
            [
                'id' => 5,
                'department_id' => 1,
                'name' => 'Technician'
            ],
            [
                'id' => 6,
                'department_id' => 3,
                'name' => 'Leader'
            ],
            [
                'id' => 7,
                'department_id' => 4,
                'name' => 'Assistant'
            ],
        ]);
    }
}
