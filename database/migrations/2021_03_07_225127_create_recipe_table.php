<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateRecipeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipe', function (Blueprint $table) {

            $table->id();
            $table->string('name');
            $table->string('time');
            $table->string('ingredients');
            $table->string('directions');
            $table->string('difficulty');
            $table->string('approved');


            $table->timestamps();
        });
        DB::statement('ALTER TABLE recipe ADD COLUMN images LONGBLOB DEFAULT NULL');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('easy_recipe');
    }
}
