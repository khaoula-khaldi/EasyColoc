<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Colocation extends Model
{
    
    use HasFactory;

    protected $table = '_colocation';

    protected $fillable = [
        'name',
        'status',
    ];

    // relation avec users (pivot)
    public function users()
    {
        return $this->belongsToMany(User::class)
                    ->withPivot('role', 'joined_at')
                    ->withTimestamps();
    }

    public function categories(){
        
        return $this->hasMany(Category::class, 'colocation_id');
    }

    public function invitations(){
        return $this->hasMany(\App\Models\Invitation::class);
    }


    public function isOwner()
    {
        $user = Auth::user();

        $pivot = $this->users
                    ->where('id', $user->id)
                    ->first()?->pivot;

        return $pivot && $pivot->role === 'owner';
    }
}
