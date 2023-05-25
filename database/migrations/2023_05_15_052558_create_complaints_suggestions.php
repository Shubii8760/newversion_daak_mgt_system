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
        Schema::create('complaints_suggestions', function (Blueprint $table) {
            $table->id();
            $table->string('name', 20);
            $table->string('email');
            $table->integer('is_verified')->default(0);
            $table->string('phone');
            $table->string('message',255);
            // $table->enum('type', ["complaints", "suggestion"]);
            $table->string('type');
            $table->string('file');
            $table->timestamps();
            // $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complaints_suggestions');
    }
};
