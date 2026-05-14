<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PanierVol extends Model
{

    protected $table = 'panier_vol';

     protected $fillable = [
          'vol_id'
      ];
  
     public function vol()
     {
          return $this->belongsTo(Vol::class,'vol_id');

     }
}