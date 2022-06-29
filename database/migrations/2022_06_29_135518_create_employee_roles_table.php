<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_roles', function (Blueprint $table) {
            $table->foreignId('employee_id')
                  ->references('id')
                  ->on('employees')
                  ->nullable()
                  ->constrained()
                  ->onDelete('cascade');

            $table->foreignId('department_role_id')
                  ->references('id')
                  ->on('department_roles')
                  ->nullable()
                  ->constrained()
                  ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_roles');
    }
};
