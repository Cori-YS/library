<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('isbn');
            $table->text('sinopse');
            $table->string('cover');
            $table->unsignedBigInteger('publisher_id');
            $table->unsignedBigInteger('area_id');
            $table->decimal('price')->default(0);
            $table->integer('stock')->default(0);
            $table->date('publishing_date');
            $table->foreign('publisher_id')
                  ->references('id')
                  ->on('publishers')
                  ->onDelete('CASCADE');
            $table->foreign('area_id')
                  ->references('id')
                  ->on('scientific_areas')
                  ->onDelete('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
