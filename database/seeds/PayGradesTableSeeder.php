<?php

use Illuminate\Database\Seeder;
use App\PayGrade;

class PayGradesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        PayGrade::updateOrCreate(['pay_grade_name' => 'N-8'], ['pay_grade_range' => '$40,050 - $46,280']);
    }
}
