<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePerformanceEvaluations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('performance_evaluations', function (Blueprint $table) {
            $table->increments('performance_evaluation_id');
            $table->unsignedInteger('employee_id');
            $table->unsignedInteger('manager_id');
            $table->unsignedInteger('department_id');
            $table->unsignedInteger('team_id');
            $table->unsignedInteger('job_title_id');
            $table->unsignedInteger('pay_grade_id');
            $table->boolean('is_complete')->default(false);
            $table->string('evaluation_cycle');
            $table->dateTime('evaluation_date');
            $table->float(' total_score');
            $table->timestamps();

            // foreign keys

            // If a user (employee) is deleted, no need to keep their reviews in the system
            $table->foreign('employee_id')
                ->references('user_id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            // If a user (employee) is deleted, no need to keep their reviews in the system
            $table->foreign('department_id')
                ->references('department_id')
                ->on('departments')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            // Do not allow delete if the manager is associated with any evaluations
            $table->foreign('team_id')
                ->references('team_id')
                ->on('teams')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            // Do not allow delete if anyone has the title currently or it is used on an evaluation
            $table->foreign('job_title_id')
                ->references('job_title_id')
                ->on('job_titles')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            // Do not allow delete if anyone has the paygrade or it is on any
            $table->foreign('pay_grade_id')
                ->references('pay_grade_id')
                ->on('pay_grades')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            // Restrict on delete - Do not allow to delete the manager (user) if they are associated with an evaluation
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
        Schema::dropIfExists('performance_evaluations');
    }
}
