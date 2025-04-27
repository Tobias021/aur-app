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
        Schema::create("zakaznik", function (Blueprint $table) {
            $table->id();
            $table->text("jmeno");
            $table->text("ulice");
            $table->text("mesto");
            $table->text("psc");
            $table->text("stat");
            $table->text("dic");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("zakaznik");
    }
};
