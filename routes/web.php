<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{CauseController, DonationController, Admin\CauseController as CauseControllerAdmin};
use App\Models\Cause;

Route::get('/', function () {
    $featuredCauses = Cause::take(3)->get(); // top 3 causes
    return view('home', compact('featuredCauses'));
});



// routes/web.php
//Route::view('/', 'home');
Route::resource('causes', CauseController::class);
Route::post('causes/{cause}/donations', [DonationController::class, 'store'])
    ->name('causes.donations.store');



// Back office (admin)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('causes', CauseControllerAdmin::class);
});
