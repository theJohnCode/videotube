<?php

use App\Http\Livewire\WatchVideo;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\Video\AllVideo;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Video\EditVideo;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\Video\CreateVideo;
use App\Http\Controllers\ChannelController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/channel/{channel}/edit', [ChannelController::class, 'edit'])->name('channel.edit');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/videos/{channel}/create', CreateVideo::class)->name('video.create');
    Route::get('/videos/{channel}/{video}/edit', EditVideo::class)->name('video.edit');
    Route::get('/videos/{channel}', AllVideo::class)->name('video.all');
});
Route::get('/watch/{video}', WatchVideo::class)->name('video.watch');
