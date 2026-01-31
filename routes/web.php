<?php

use App\Http\Controllers\AcceptInvitationController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canRegister' => Features::enabled(Features::registration()),
    ]);
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

Route::get('/invitations/{token}', [AcceptInvitationController::class, 'show'])
    ->name('invitations.accept');
Route::post('/invitations/accept', [AcceptInvitationController::class, 'store'])
    ->name('invitations.store');

require __DIR__.'/settings.php';
