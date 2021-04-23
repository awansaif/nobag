<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellerProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seller_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seller_id')->constrained('sellers')->onDelete('Cascade')->nullable();
            $table->string('personal_photo')->nullable();
            $table->mediumText('slogan')->nullable();
            $table->text('self_description')->nullable();
            $table->string('spoken_language', 150)->nullable();
            $table->string('qualifiaction')->nullable();
            $table->string('personal_video')->nullable();
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
        Schema::dropIfExists('seller_profiles');
    }
}
