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
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->string('title',100)->comment('Title');
            $table->string('content',255)->comment('Content');
            $table->boolean('publish')->default(false)->comment('Publish');
            $table->integer('price')->default(0)->comment('Price');
            $table->dateTime('from_date')->comment('When start?');
            $table->dateTime('till_date')->comment('When finish?');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};
