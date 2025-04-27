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
        Schema::create("doklady", function (Blueprint $table) {
            $table->string("cislo_opravneho_dokladu");
            $table->date("datum_platby");
            $table->string("zakaznik_id");
            $table->string("dic")->nullable(true);
            $table->string("cislo_dokladu");
            $table->float("castka_ne_dph", 2)->default(0);
            $table->float("castka_bez_dph", 2)->default(0);
            $table->float("sazba_dph")->default(0.21);
            $table->float("dph", 2)->default(0);
            $table->float("castka_celkem", 2)->default(0);
            $table->string("mena")->nullable(false);
            $table->string("cislo_zalohove_faktury")->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("doklady");
    }
};
