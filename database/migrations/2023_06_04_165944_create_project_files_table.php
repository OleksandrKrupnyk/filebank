<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('project_files', function (Blueprint $table) {
            $table->id();
            $table->string('entity_type')->comment('Entity Type');
            $table->string('entity_field')->comment('Entity Field');
            $table->integer('entity_id')->comment('Entity Id');
            $table->string('file_name')->comment('File Name');
            $table->string('ext', 5)->comment('Ext');
            $table->boolean('published',)->default(false)->comment('Published?');
            $table->boolean('is_collection',)->default(false)->comment('Is Collection?');
            $table->integer('position',)->default(0)->comment('Position');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_files');
    }
};
