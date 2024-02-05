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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('logoTagLine', 255)->nullable();
            $table->string('logoLink', 255)->nullable();
            $table->string('copyRightText', 255)->nullable();
            $table->text('description')->nullable();
            $table->string('contactInfo', 255)->nullable();
            $table->string('emailId', 255)->nullable();
            $table->string('facebookInfo', 255)->nullable();
            $table->string('twitterInfo', 255)->nullable();
            $table->string('linkedInInfo', 255)->nullable();
            $table->string('instagramInfo', 255)->nullable();
            $table->string('youtubeInfo', 255)->nullable();
            $table->string('image', 255)->nullable();
            $table->enum('is_enabled', ['y', 'n'])->default('y');
            $table->enum('is_deleted', ['y', 'n'])->default('n');
            $table->timestamps();
            $table->softDeletes(); // Adds a "deleted_at" column for soft deletes
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
};
