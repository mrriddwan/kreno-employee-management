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
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email');
            $table->string('address')->nullable();
            $table->string('employee_photo')->nullable();
            $table->string('employee_photo_path')->nullable();
            $table->unsignedBigInteger('department_id')->nullable()->constrained();
            $table->unsignedBigInteger('department_role_id')->nullable()->constrained();
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->foreign('department_role_id')->references('id')->on('department__roles')->onDelete('cascade');
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
        Schema::dropIfExists('employees');
    }
};
