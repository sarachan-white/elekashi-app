<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                歌詞の一覧
            </h2>
            
        </div>
        <x-message :message="session('message')"/>
    </x-slot>
    <div class="container">
        <div class="flex row">
            <div class="col-12 col-md-4 col-lg-3">
                @livewire('search-lyrics')
            </div>
            <div class="col-12 col-md-8 col-lg-9 pl-6">
                {{ $user->name }}さん、こんにちは！ タイトルをポチれば個別ページにジャンプします♪
            
                @foreach ($lyrics as $lyric)
                    <div class="mx-4 sm:p-8">
                        <div class="mt-4">
                            <div class="bg-white w-full rounded-2xl px-10 pt-2 pb-8 shadow-lg hover:shadow-2xl transition duration-500">
                                <div class="mt-4">
                                    <div class="flex">
                                        <div class="rounded-full w-12 h-12">
                                            <img src="{{ asset('storage/avatar/'.($lyric->user->avatar??'user_default.jpg')) }}" alt="">
                                        </div>
                                        <h1 class="text-lg text-gray-700 font-semibold hover:underline cursor-pointer hover:text-blue-600 float-left pt-4">
                                        <a href="{{ route('lyric.show',$lyric) }}">{{ $lyric->title }}</a>
                                        </h1>
                                    </div>
                                    <hr class="w-full">
                                    <p class="mt-4 text-gray-600 py-4">{{ Str::limit($lyric->body,165,'...') }}</p>
                                    <div class="text-sm font-semibold flex flex-row-reverse">
                                        <p>{{ $lyric->user->name??'削除されたユーザー' }}・{{ $lyric->created_at->diffForHumans() }}</p>
                                    </div>
                                    <hr class="w-full mb-2">
                                    @if ($lyric->comments->count())
                                        <a href="{{ route('lyric.show',$lyric) }}">
                                            <span class="badge">
                                            返信{{ $lyric->comments->count() }}件
                                            </span>
                                        </a>
                                    @else
                                        <span>コメントはまだありません</span>
                                    @endif
                                    <a href="{{ route('lyric.show',$lyric) }}" style="color: white;">
                                        <x-primary-button class="float-right">コメントする</x-primary-button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="mb-4">
                    {{ $lyrics->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>