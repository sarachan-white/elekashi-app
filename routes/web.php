<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LyricController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;
use App\Livewire\SearchLyrics;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//お問い合わせ
Route::get('contact/create', [ContactController::class, 'create'])->name('contact.create');
Route::post('contact/store', [ContactController::class, 'store'])->name('contact.store');
//検索
Route::get('/search', [SearchController::class, 'index'])->name('search.index');
Route::get('search/result', [SearchController::class, 'result'])->name('search.result');

// Route::get('/search-lyrics', function () {
//     return view('lyric.index');
// });
Route::get('/search-lyrics', SearchLyrics::class);

Route::middleware(['verified'])->group(function () {
    Route::get('lyric/mylyric', [LyricController::class, 'mylyric'])->name('lyric.mylyric');
    Route::get('lyric/mycomment', [LyricController::class, 'mycomment'])->name('lyric.mycomment');
    Route::get('lyric/search', [LyricController::class, 'search'])->name('lyric.search');
    Route::resource('lyric', LyricController::class);
    Route::post('lyric/comment/store', [CommentController::class, 'store'])->name('comment.store');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    //Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //管理者画面
    Route::middleware(['can:admin'])->group(function () {
        Route::get('profile/index', [ProfileController::class, 'index'])->name('profile.index');
        Route::get('/profile/adedit/{user}', [ProfileController::class, 'adedit'])->name('profile.adedit');
        Route::patch('/profile/adupdate/{user}', [ProfileController::class, 'adupdate'])->name('profile.adupdate');
        Route::delete('profile/{user}', [ProfileController::class, 'addestroy'])->name('profile.addestroy');
        Route::patch('roles/{user}/attach', [RoleController::class, 'attach'])->name('role.attach');
        Route::patch('roles/{user}/detach', [RoleController::class, 'detach'])->name('role.detach');
    });
});

require __DIR__ . '/auth.php';

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Language Switcher Route 言語切替用ルートだよ
// Route::get('language/{locale}', function ($locale) {
//     app()->setLocale($locale);
//     session()->put('locale', $locale);

//     return redirect()->back();
// });