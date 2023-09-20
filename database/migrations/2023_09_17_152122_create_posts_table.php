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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('perple_id')
                ->nullable()
                ->constrained('people')
                ->nullOnDelete();
            $table->string('title', 255);
            $table->text('body');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('created_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropForeign(['person_id']);
        Schema::dropIfExists('posts');
    }
};
