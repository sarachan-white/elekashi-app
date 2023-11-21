<x-guest-layout>
    <section class="text-gray-600 body-font bg-blue-500">
        <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
            <div class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
            <h1 class="title-font sm:text-4xl text-3xl mb-4 font-semibold text-gray-900">THE ELEPHANT KASHIMASHI
                <br class="hidden lg:inline-block">エレ歌詞
            </h1>
            <p class="mb-8 leading-relaxed text-white">我らの推し！！エレファントカシマシの歌詞について篤く語りましょう！<br>初めての方は、会員登録をしてくださいね♪</p>
            <div class="flex justify-center">
                <a href="{{ route('register') }}"><button class="inline-flex text-white bg-pink-500 border-0 py-2 px-6 focus:outline-none hover:bg-pink-600 rounded text-lg hover:translate-y-1">ご登録はこちら</button></a>
                <a href="{{ route('login') }}"><button class="ml-4 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg hover:translate-y-1">ログインはこちら</button></a>
            </div>
            <div class="mt-4 flex justify-center">
                <a href="{{ route('contact.create') }}"><button class="inline-flex text-white bg-pink-500 border-0 py-2 px-6 focus:outline-none hover:bg-pink-600 rounded text-lg hover:translate-y-1">お問い合わせ</button></a>
            </div>
            </div>
            <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
            <img class="object-cover object-center rounded" alt="" src="{{ asset('logo/elephant.jpg') }}">
            </div>
        </div>
    </section>

    <footer class="text-gray-600 body-font">
        <div class="container px-5 py-8 mx-auto flex items-center sm:flex-row flex-col">
            <a class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900">
            {{-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-pink-500 rounded-full" viewBox="0 0 24 24">
                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
            </svg> --}}
            <span class="ml-3 text-xl">エレ歌詞</span>
            </a>
            <p class="text-sm text-gray-500 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-200 sm:py-2 sm:mt-0 mt-4">© 2023 elelyrics —
            {{-- <a href="#" class="text-gray-600 ml-1" rel="noopener noreferrer" target="_blank">#</a> --}}
            </p>
            <span class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start">
            
            </span>
        </div>
    </footer>
</x-guest-layout>