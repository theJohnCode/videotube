<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ChannelController;
use App\Http\Livewire\Video\AllVideo;
use App\Http\Livewire\Video\CreateVideo;
use App\Http\Livewire\Video\EditVideo;

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
