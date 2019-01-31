<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('mobile_number',10)->unique();
            $table->string('nationality');
            $table->string('city',3);
            $table->string('Referall')->nullable();
            $table->string('iban',24)->unique();
            $table->string('National_id',10);
            $table->string('vehicule_type');
            $table->string('national_card');
            $table->string('driving_licence_card');
            $table->string('car_registration_card');
            $table->string('driving_authorizing')->nullable();
            $table->string('bank_account_card')->nullable();
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
        Schema::dropIfExists('drivers');
    }
}
