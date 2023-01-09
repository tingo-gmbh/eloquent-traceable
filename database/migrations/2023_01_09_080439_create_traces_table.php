<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('traces', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('traceable_id');
            $table->string('traceable_type');

            $table->string('title', 100);
            $table->string('description', 255);
            $table->string('creator_email', 100);
            $table->string('creator_name', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('traces');
    }
};
