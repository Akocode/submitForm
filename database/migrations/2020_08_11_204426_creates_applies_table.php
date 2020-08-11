<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatesAppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applies', function (Blueprint $table) {
            $table->id();
            $table->string('FirstName');
            $table->string('LastName');
            $table->string('UserName');
            $table->string('PhoneNumber');
            $table->string('resumefile')->nullable();
            $table->string('JobOrder_AdditionalInformation');
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
        Schema::dropIfExists('applies');
    }
}
