<?php

use App\Http\Controllers\ProfileController;
use App\Http\Middleware\newUserMiddleware;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {

    $user = User::find(Auth::user()->id);
    if ($user->isAdmin()) {
        return redirect()->route('filament.admin.pages.dashboard');
    }
    return redirect()->route('filament.seller.pages.dashboard');
})->middleware(['auth', 'newUser'])->name('dashboard');

Route::middleware(['auth', 'newUser'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
