<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RecentlyEventsController;
use Illuminate\Support\Facades\Route;



Route::middleware('auth')->group(function () {
    Route::resource('events', EventController::class);
    // Route::resource('events', EventController::class)->middleware('auth')->only(['create', 'edit', 'destroy']);
    // Route::resource('events', EventController::class)->except(['create', 'edit', 'destroy']);
    Route::resource('dashboard', DashboardController::class);
    Route::resource('events', EventController::class);

    Route::resource('account', AccountController::class);

    Route::get('/signup', [AccountController::class, 'signup'])->name('auth.signup');

    Route::get('/recently-events/search', [RecentlyEventsController::class, 'search'])
        ->name('recentlyEvents.search');
    Route::resource('recentlyEvents', RecentlyEventsController::class);

    Route::get('/recently-events/total-events', [RecentlyEventsController::class, 'totalEvents'])
        ->name('recentlyEvents.totalEvents');

    Route::get('/recently-events/this-month-events', [RecentlyEventsController::class, 'thisMonthEvents'])
        ->name('recentlyEvents.thisMonthEvents');

    Route::get('/recently-events/upcomingEvents', [RecentlyEventsController::class, 'upcomingEvents'])
        ->name('recentlyEvents.upcomingEvents');

    Route::get('/recently-events/archivedEvents', [RecentlyEventsController::class, 'archivedEvents'])
        ->name('recentlyEvents.archivedEvents');
    Route::delete('/events/destroyArchiveEvents/{id}', [EventController::class, 'destroyArchiveEvents'])
        ->name('events.destroyArchiveEvents');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
// Route::resource('account', AccountController::class);



Route::middleware('guest')->group(function () {

    // Route::resource('account', AccountController::class);
    Route::get('/login', [AccountController::class, 'login'])->name('auth.login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');

    Route::get('/', [HomeController::class, 'index'])->name('pages.index');
    Route::resource('pages', HomeController::class);
    Route::get('/about', [HomeController::class, 'about'])->name('pages.about');
    Route::get('/services', [HomeController::class, 'services'])->name('pages.services');
    Route::get('/contact', [HomeController::class, 'contact'])->name('pages.contact');
});
