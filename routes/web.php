<?php

use App\Http\Controllers\EventCategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// Home route
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Authenticated and verified user routes
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');

    Route::get('/userList', [UserController::class, 'displayList'])->name('user.list');
    Route::get('/eventsList', [EventController::class, 'displayList'])->name('events.list');

    Route::get('/events/manage', [EventController::class, 'myList'])->name('events.myList');

    Route::post('/favorites/{event}', [FavoriteController::class, 'store'])->name('favorites.store');
    Route::delete('/favorites/{event}', [FavoriteController::class, 'destroy'])->name('favorites.destroy');


});
// CRUD Routes
// Users
Route::get('/users/{id}', [UserController::class, 'show']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'delete'])->name('users.delete');

// events
Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
Route::post('/events', [EventController::class, 'store'])->name('events.store');
Route::get('/event-categories', [EventCategoryController::class, 'index'])->name('event_categories.index');

// Tickets
Route::get('/tickets/create/{event_id}', [TicketController::class, 'create'])->name('tickets.create');
Route::post('/tickets', [TicketController::class, 'store'])->name('tickets.store');

// Event Lists
Route::get('/events/category/{categoryName}', [EventController::class, 'eventsByCategory'])->name('events.byCategory');

// Manage Event


// Admin-only routes
Route::middleware(['auth:sanctum', 'verified', 'role'])->group(function () {
    Route::get('/userList', [UserController::class, 'displayList'])->name('users.list');
    Route::get('/eventsList', [EventController::class, 'displayList'])->name('events.list');

    Route::get('/dashboard', function () {
        return view('Dashboard');
    })->name('dashboard');



});

// Email verification routes (using Jetstream)
Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
    return view('welcome');
})->name('welcome');

// Email verification notice
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

// Email verification handler
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

// Resend email verification link
Route::post('/email/resend', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
