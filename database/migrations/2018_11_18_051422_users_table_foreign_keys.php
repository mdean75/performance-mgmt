<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersTableForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('users', function (Blueprint $table) {

        // add foreign key for team

        // Restrict on delete - We do not want to allow a team record to be deleted if there are any user records associated with it
        $table->foreign('team_id')
            ->references('team_id')
            ->on('teams')
            ->onDelete('restrict')
            ->onUpdate('cascade');



        // Restrict on delete - We do not want to delete a job title that is being used
        $table->foreign('job_title_id')
            ->references('job_title_id')
            ->on('job_titles')
            ->onDelete('restrict')
            ->onUpdate('cascade');

        // Restrict on delete - We do not want to delete a department that has employees
        $table->foreign('department_id')
            ->references('department_id')
            ->on('departments')
            ->onDelete('restrict')
            ->onUpdate('cascade');

        // Restrict on delete - Do not allow delete if there are employees with the pay grade
        $table->foreign('pay_grade_id')
            ->references('pay_grade_id')
            ->on('pay_grades')
            ->onDelete('restrict')
            ->onUpdate('cascade');

        // Add foreign key for manager_id to Restrict on delete - If a manager is deleted they must first
        // transfer all employees to another manager
        $table->foreign('manager_id')
            ->references('user_id')
            ->on('users')
            ->onDelete('restrict')
            ->onUpdate('cascade');



    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
