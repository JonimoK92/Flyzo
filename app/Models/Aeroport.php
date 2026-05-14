<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Vol;

class Aeroport extends Model
{
    
    public function vol() {
        return $this->hasMany(Vol::class);
    }

}
