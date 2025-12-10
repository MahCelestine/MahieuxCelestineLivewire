<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KpopSong extends Model
{
    protected $fillable = [
        'title',
        'artist',
        'audio_path',
        'album',
        'release_year',
        'genre',
    ];
}
