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
        Schema::create('company_employee', function (Blueprint $table) {
            $table->id();
            $table->string('EmpidName',40);
            $table->date('HireDate');
            $table->double('Age');
            $table->enum('Gender',['male','fmale'])->nullable();
            $table->string('salary',6);
            $table->integer('EmpDepid');
            $table->integer('Managerid');
            $table->integer('EmpStatus');
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
        Schema::dropIfExists('company_employee');
    }
};
