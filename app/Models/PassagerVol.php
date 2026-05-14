<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PassagerVol extends Model
{   
     protected $table = 'passager_vol';

     protected $fillable = [
          'passager_id',
          'vol_id',
      ];

     public function passager()
     {
          return $this->belongsTo(Passager::class, 'passager_id');
     }
  
     public function vol()
     {
          return $this->belongsTo(Vol::class, 'vol_id');
     }
}
