<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Song;

class Album extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'image',
        'description'
    ];

    public function scopeSearch($query)
    {
        $search = request()->search;
        return $query->where('name', 'like',"%$search%");
    }

    public function songs($query)
    {
        return $query->hasMany(Song::class , 'genre_id', 'id');
    }
}
