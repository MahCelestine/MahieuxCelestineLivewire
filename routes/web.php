<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', \App\Livewire\HomePage::class)->name('home');
Route::get('/game', \App\Livewire\GamePage::class)->name('game');
Route::get('/leaderboard', \App\Livewire\LeaderboardPage::class)->name('leaderboard');
Route::get('/rules', \App\Livewire\RulesPage::class)->name('rules');
Route::get('/profil', \App\Livewire\Profil::class)->name('profil')->middleware('auth');
Route::get('/endgame', \App\Livewire\EndGame::class)->name('endgame');
