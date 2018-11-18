<?php

use Illuminate\Database\Seeder;
use App\JobTitle;

class JobTitlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        JobTitle::updateOrCreate(['job_title_name' => 'Software Engineer I']);
    }
}
