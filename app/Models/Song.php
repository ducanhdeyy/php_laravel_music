<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'file_url',
        'image',
        'album_id',
        'singer_id',
        'genre_id'
    ];

    public function scopeSearch($query)
    {
        $search = request()->search;
        return $query->where('name', 'like',"%$search%");
    }

    public function album()
    {
        return $this->belongsTo(Album::class, 'album_id', 'id');
    }

    public function singer()
    {
        return $this->belongsTo(Singer::class, 'singer_id', 'id');
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class, 'genre_id', 'id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'playlists', 'song_id', 'user_id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'song_id', 'id');
    }

}
