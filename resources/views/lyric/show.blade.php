<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            歌詞の個別ページ
        </h2>
        <x-message :message="session('message')"/>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mx-4 sm:p-8">
            <div class="px-10 mt-4">
                <div class="bg-white w-full rounded-2xl px-10 pt-2 pb-8 shadow-lg hover:shadow-2xl transition duration-500">
                    <div class="mt-4">
                        <div class="flex">
                            <div class="rounded-full w-12 h-12">
                                <img src="{{ asset('storage/avatar/'.($lyric->user->avatar??'user_default.jpg')) }}" alt="">
                            </div>
                            <h1 class="text-lg text-gray-700 font-semibold float-left pt-4">
                            {{ $lyric->title }}
                            </h1>
                        </div>
                        
                        <hr class="w-full">
                        <div class="flex justify-end mt-4">
                            @can('update',$lyric)
                            <a href="{{route('lyric.edit', $lyric)}}"><x-primary-button class="bg-teal-700 float-right">編集</x-primary-button></a>
                            @endcan
                            @can('delete',$lyric)
                            <form method="post" action="{{route('lyric.destroy', $lyric)}}">
                            @csrf
                            @method('delete')
                                <x-primary-button class="bg-red-700 float-right ml-4" onClick="return confirm('本当に削除しますか？');">削除</x-primary-button>
                            </form>
                            @endcan
                        </div>
                        <p class="mt-4 text-gray-600 py-4 whitespace-pre-line">{{ $lyric->body }}</p>
                        {{-- 画像 --}}
                            @if ($lyric->image)
                                <div>
                                    (画像ファイル:{{ $lyric->image }})
                                </div>
                                <img src="{{ asset('storage/images/'.$lyric->image) }}" class="mx-auto" style="height: 300px;" alt="">
                            @endif
                        <div class="text-sm font-semibold flex flex-row-reverse">
                            <p>{{ $lyric->user->name??'削除されたユーザー' }}・{{ $lyric->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                    {{-- コメント --}}
                    @foreach ($lyric->comments as $comment)
                        <div class="bg-white w-full rounded-2xl px-10 py-2 shadow-lg mt-8 whitespace-pre-line">
                            {{ $comment->body }}
                            <div class="text-sm font-semibold flex flex-row-reverse">
                                <p class="float-left pt-4">{{ $comment->user->name??'削除されたユーザー' }}・{{ $comment->created_at->diffForHumans() }}</p>
                                <span class="rounded-full w-12 h-12">
                                    <img src="{{ asset('storage/avatar/'.($comment->user->avatar??'user_default.jpg')) }}" alt="">
                                </span>
                            </div>
                        </div>
                    @endforeach
                    <div class="mt-4 mb-12">
                        <form method="post" action="{{ route('comment.store') }}">
                            @csrf
                            <input type="hidden" name="lyric_id" value="{{ $lyric->id }}">
                            <textarea name="body" class="bg-white w-full rounded-2xl px-4 mt-4 py-4 shadow-lg hover:shadow-2xl transition duration-500" id="body" cols="30" rows="3" placeholder="コメントを入力してください">{{ old('body') }}</textarea>
                            <x-primary-button class="float-right mr-4 mb-12">コメントする</x-primary-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>