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
        Schema::create('awardsandrecognition', function (Blueprint $table) {
            $table->id(); // Auto-incremental primary key
            $table->string('title', 500);
            $table->text('description');
            $table->string('image')->nullable(); // Assuming the image can be nullable
            $table->enum('is_enabled', ['y', 'n'])->default('y');
            $table->enum('is_deleted', ['y', 'n'])->default('n');
            $table->timestamps(); // Created_at and updated_at columns
            $table->softDeletes(); // deleted_at column for soft deletes
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('awardsandrecognition');
    }
};
