<div>
    <input wire:model.live="search" type="text" class="box-content h-5 w-32" placeholder="Search title..."/>
    <ul>
        @foreach ($lyrics as $lyric)
          <li><a href="{{ route('lyric.show',$lyric) }}">・{{ Str::limit($lyric->title,17,'...') }}</a></li>
        @endforeach
    </ul>
    <div class="mt-4" style="text-align: right">
      {{ $lyrics->links() }}
    </div>
</div>
