<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Despense extends Model
{
    protected $fillable = ['title', 'amount', 'colocation_id'];
}