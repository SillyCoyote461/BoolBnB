<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->char('name');
            $table->char('rooms')->nullable();
            $table->char('beds');
            $table->char('baths')->nullable();
            $table->smallInteger('meters');
            $table->smallInteger('price');
            $table->char('address');
            $table->char('visibility')->nullable();
            $table->text('description')->nullable();
            $table->string('cover');
            $table->decimal('lat', 18, 15);
            $table->decimal('lon', 18, 15);
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
        Schema::dropIfExists('apartments');
    }
}
