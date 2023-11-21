<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'body',
        'user_id',
        'lyric_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lyric()
    {
        return $this->belongsTo(Lyric::class);
    }
}
