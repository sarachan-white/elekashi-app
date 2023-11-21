<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Searchable\Search;
use App\Models\Lyric;

class SearchController extends Controller
{
    public function index()
    {
        return view('lyric');
    }

    public function result(Request $request)
    {
        $searchResults = (new Search())
            ->registerModel(Lyric::class, 'title', 'body')
            ->perform($request->input('query'));

        return view('search.result', compact('searchResults'));
    }
}
