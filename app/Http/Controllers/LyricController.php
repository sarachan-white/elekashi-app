<?php

namespace App\Http\Controllers;

use App\Models\Lyric;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LyricController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lyrics = Lyric::orderBy('created_at', 'desc')->paginate(5);
        $user = auth()->user();
        return view('lyric.index', compact('lyrics', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lyric.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $inputs = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required|max:1000',
            'image' => 'image|max:1024',
        ]);
        $lyric = new Lyric();
        $lyric->user_id = auth()->user()->id;
        $lyric->title = $inputs['title'];
        $lyric->body = $inputs['body'];
        if (request('image')) {
            $original = request()->file('image')->getClientOriginalName();
            $name = date('Ymd_His') . '_' . $original;
            request()->file('image')->move('storage/images', $name);
            $lyric->image = $name;
        }
        $lyric->save();
        return redirect()->route('lyric.create')->with('message', '歌詞を作成しました');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lyric $lyric)
    {
        return view('lyric.show', compact('lyric'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lyric $lyric)
    {
        $this->authorize('update', $lyric);
        return view('lyric.edit', compact('lyric'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lyric $lyric)
    {
        $this->authorize('update', $lyric);
        $inputs = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required|max:1000',
            'image' => 'image|max:1024',
        ]);
        $lyric->title = $inputs['title'];
        $lyric->body = $inputs['body'];
        if (request('image')) {
            $original = request()->file('image')->getClientOriginalName();
            $name = date('Ymd_His') . '_' . $original;
            $file = request()->file('image')->move('storage/images', $name);
            $lyric->image = $name;
        }
        $lyric->save();
        return redirect()->route('lyric.show', $lyric)->with('message', '歌詞を更新しました');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lyric $lyric)
    {
        $this->authorize('delete', $lyric);
        if ($lyric->image) {
            $image = 'public/images/' . $lyric->image;
            Storage::delete($image);
        }
        $lyric->comments()->delete();
        $lyric->delete();
        return redirect()->route('lyric.index')->with('message', '歌詞を削除しました');
    }

    public function mylyric()
    {
        $user = auth()->user()->id;
        $lyrics = Lyric::where('user_id', $user)->orderBy('created_at', 'desc')->paginate(5);
        return view('lyric.mylyric', compact('lyrics'));
    }

    public function mycomment()
    {
        $user = auth()->user()->id;
        $comments = Comment::where('user_id', $user)->orderBy('created_at', 'desc')->paginate(5);
        return view('lyric.mycomment', compact('comments'));
    }
}
