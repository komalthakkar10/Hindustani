<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotherDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mother_details', function (Blueprint $table) {
            $table->id();
            $table->Integer('user_id');
            $table->string('name');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('child_name');
            $table->bigInteger('aadhar');
            $table->date('birth_date');
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
        Schema::dropIfExists('mother_details');
    }
}
