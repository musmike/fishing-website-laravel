<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFishesTable extends Migration
{
    public function up()
    {
        Schema::create('fishes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('location');
            $table->string('fish_species');
            $table->decimal('catch_weight', 8, 2);
            $table->date('catch_date');
            $table->string('photo_path')->nullable(); // Dodane pole do przechowywania ścieżki do zdjęcia
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('fishes');
    }
}

