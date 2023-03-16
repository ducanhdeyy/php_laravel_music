<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'song_id',
        'price'
    ];

    public function scopeSearch($query)
    {
        $search = request()->search;
        return $query->where('user_id', 'like', "%$search%");
    }
    
    public function song()
    {
        return $this->belongsTo(Song::class, 'song_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
