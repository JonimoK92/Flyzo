<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePassagerVolTable extends Migration
{
    public function up(): void
    {
        Schema::create('passager_vol', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('passager_id');
            $table->foreignId('vol_id');
            $table->integer('quantite');
            $table->timestamps();   
        });
    }

    public function down(): void
    {

        Schema::dropIfExists('passager_vol');
    }
}