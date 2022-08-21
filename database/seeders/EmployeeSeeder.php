<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('employees')->insert([
        //     [
        //         'id' => 1,
        //         'name' => 'Alex'
        //     ],
        //     [
        //         'id' => 2,
        //         'name' => 'Ryan'
        //     ],
        //     [
        //         'id' => 3,
        //         'name' => 'Fareed'
        //     ],
        //     [
        //         'id' => 4,
        //         'name' => 'Lee'
        //     ],
        // ]);

        Employee::factory()->count(100)->create();
    }
}
