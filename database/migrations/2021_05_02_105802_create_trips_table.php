<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seller_id')->constrained('sellers')->onDelete('Cascade');
            $table->string('event_title');
            $table->string('place');
            $table->text('description');
            $table->mediumText('short_description');
            $table->string('date');
            $table->String('time');
            $table->string('frequency')->nullable();
            $table->string('tongue');
            $table->float('cost');
            $table->string('video_trailer');
            $table->text('photos');
            $table->text('google_map')->nullable();
            $table->string('max_seats');
            $table->string('min_seats');
            $table->String('available_places');
            $table->string('closing_date_of_the_sale');
            $table->string('digital_guide')->nullable();
            $table->string('virtual_connection_link')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trips');
    }
}
