<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'token',
        'expires_at',
        'colocation_id',
    ];

    protected $dates = [
        'expires_at',
    ];

    // Relation vers la colocation
    public function colocation()
    {
        return $this->belongsTo(Colocation::class);
    }
}