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
        Schema::create('project_files', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->string('title');
            $table->string('srs')->nullable();
            $table->string('sql')->nullable();
            $table->string('document')->nullable();
            $table->string('source_code_zip')->nullable();
            $table->string('apk_file')->nullable();
            $table->string('api_file')->nullable();
            $table->text('note')->nullable();
            $table->string('scene_short')->nullable();
            $table->string('eoi_file')->nullable();
            $table->string('rfp_file')->nullable();
            $table->string('contract_sign_file')->nullable();
            $table->string('release_file')->nullable();
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
