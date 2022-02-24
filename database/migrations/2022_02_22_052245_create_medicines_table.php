<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->id();
            $table->string("Generic Name", 100);
            $table->string("Form", 100);
            $table->string("Restriction Formula", 100);
            $table->string("Description", 100);
            $table->boolean("faskes_1", false);
            $table->boolean("faskes_2", false);
            $table->boolean("faskes_3", false);
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
        Schema::dropIfExists('medicines');
    }
}
