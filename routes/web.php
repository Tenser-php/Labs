<?php

use App\Http\Controllers\PersonController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/person/basic');

Route::prefix('person')->name('person.')->group(function () {
	Route::get('/basic', [PersonController::class, 'basic'])->name('basic');
	Route::get('/paginate', [PersonController::class, 'paginate'])->name('paginate');
	Route::get('/orm', [PersonController::class, 'orm'])->name('orm');
});
