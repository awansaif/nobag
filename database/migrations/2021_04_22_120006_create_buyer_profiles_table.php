<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuyerProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buyer_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('buyer_id')->constrained('buyers')->onDelete('Cascade')->nullable();
            $table->string('nickename')->nullable();
            $table->string('personal_photo')->nullable();
            $table->string('tongue')->nullable();
            $table->string('passions')->nullable();
            $table->string('short_description')->nullable();
            $table->string('fiscal_code', 120)->nullable();
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
        Schema::dropIfExists('buyer_profiles');
    }
}
