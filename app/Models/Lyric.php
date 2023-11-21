<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Lyric extends Model implements Searchable
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'body',
        'image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getSearchResult(): SearchResult
    {
        $url = route('lyric.show', $this->id);

        return new SearchResult(
            $this,
            $this->title,
            $url
        );
    }
}
