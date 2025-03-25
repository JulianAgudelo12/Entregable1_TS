<?php

/* Developed by Julian Agudelo */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateComponentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('components', function (Blueprint $table) {
            $table->id();
            $table->string('reference');
            $table->string('name');
            $table->string('brand');
            $table->integer('quantity');
            $table->binary('image');
            $table->string('speed');
            $table->string('capacity')->nullable();
            $table->string('generation');
            $table->string('type');
            $table->integer('cores')->nullable();
            $table->integer('price');
            $table->timestamps();
        });

        DB::statement('ALTER TABLE components MODIFY image LONGBLOB');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('components');
    }
}
