<?php

/* Developed by Julián Agudelo Cifuentes */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up(): void
  {
    Schema::create('pc_components', function (Blueprint $table) {
      $table->id();
      $table->string('reference');
      $table->string('name');
      $table->string('brand');
      $table->integer('quantity');
      $table->string('image');
      $table->string('speed')->nullable();
      $table->string('capacity')->nullable();
      $table->string('generation')->nullable();
      $table->integer('cores')->nullable();
      $table->string('type');
      $table->float('price');
      $table->string('description');
      $table->timestamps();
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('pc_components');
  }
};
