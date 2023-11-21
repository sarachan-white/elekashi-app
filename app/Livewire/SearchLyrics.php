<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Lyric;

class SearchLyrics extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        $search = '%' . $this->search . '%';
        return view('livewire.search-lyrics', [
            'lyrics' => Lyric::where('title', 'like', $search)->paginate(30),
        ]);
    }
}
