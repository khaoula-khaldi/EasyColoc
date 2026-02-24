<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Colocation extends Model
{
    public function colocation(){
        return $this->belongsToMany(colocation::class);
    }
}
