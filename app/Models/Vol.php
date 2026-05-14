<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Aeroport;

class Vol extends Model
{
    
    public function depart_aeroport() {
        return $this->belongsTo(Aeroport::class, 'depart_aeroport_id');
    }

    public function final_aeroport() {
        return $this->belongsTo(Aeroport::class, 'final_aeroport_id');
    } 
}
