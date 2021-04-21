<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellers', function (Blueprint $table) {
            $table->id();
            $table->string('user_name', 150)->unique()->nullable();
            $table->string('password')->nullable();
            $table->string('visible_password')->nullable();
            $table->string('first_name', 150);
            $table->string('surname', 150);
            $table->string('pob');
            $table->string('dob');
            $table->string('nationality');
            $table->string('phone', 100)->unique();
            $table->string('email', 150)->unique();
            $table->string('fiscal_code');
            $table->string('vat_number');
            $table->string('registration_number')->nullable();
            $table->string('iban');
            $table->boolean('is_verified')->default(0);
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
        Schema::dropIfExists('sellers');
    }
}
