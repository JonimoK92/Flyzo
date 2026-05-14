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
        Schema::create('vols', function (Blueprint $table) {
            $table->id();
            $table->string('numero');
            $table->date('jour_depart');
            $table->date('jour_arrivee');
            $table->time('heure_depart');
            $table->time('heure_arrivee');
            $table->integer('places');
            $table->integer('prix');
            $table->foreignId('depart_aeroport_id');
            $table->foreignId('final_aeroport_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vols');
    }
};
