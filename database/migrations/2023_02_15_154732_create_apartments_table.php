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
            $table->string('name');
            $table->tinyInteger('rooms')->nullable();
            $table->tinyInteger('beds');
            $table->tinyInteger('baths')->nullable();
            $table->smallInteger('meters');
            $table->decimal('price', 8, 2);
            $table->string('address');
            $table->boolean('visibility')->nullable();
            $table->text('description')->nullable();
            $table->string('cover');
            $table->decimal('lat')->default(45.0);
            $table->decimal('lon')->default(45.0);
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