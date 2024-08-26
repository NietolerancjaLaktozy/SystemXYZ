<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactFormController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware(['auth', 'verified']);//nie uzywane

Route::get('/', function () {
    return view('home');
});

Route::get('/home', function (Request $request) {
    return view('home');
})->name('home');

Route::get('/locale/{locale}', function (Request $request, $locale) {
    Session::put('locale', $locale);
    return redirect()->back();
})->name('locale');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/contact', [ContactFormController::class, 'submit'])->name('contact.submit');

Route::get('/admin', function () {
    return view('admin');
})->name('admin')->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
