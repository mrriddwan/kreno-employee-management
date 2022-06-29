<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            [
                'id' => 1,
                'name' => 'Human Resource'
            ],
            [
                'id' => 2,
                'name' => 'Research and Development'
            ],
            [
                'id' => 3,
                'name' => 'Admins'
            ],
            [
                'id' => 4,
                'name' => 'Production'
            ],
        ]);
    }
}
