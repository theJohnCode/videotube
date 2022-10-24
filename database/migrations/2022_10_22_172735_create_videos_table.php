<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('channel_id')->constrained('channels')->cascadeOnDelete();
            $table->string('title');
            $table->string('description')->nullable();
            $table->integer('views')->default(0);
            $table->string('uid');
            $table->string('url')->nullable();
            $table->string('processed_file')->nullable();
            $table->enum('visibility', ['public', 'private', 'unlisted'])->default('private');
            $table->string('thumbnail_image')->nullable();
            $table->string('processing_percentage')->nullable();

            $table->boolean('processed')->default(false);
            $table->boolean('allow_likes')->default(false);
            $table->boolean('allow_comments')->default(false);
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
        Schema::dropIfExists('videos');
    }
};
