<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Song;

class Singer extends Model
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

    public function songs()
    {
        return $this->hasMany(Song::class , 'singer_id', 'id');
    }
}
