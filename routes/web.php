<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('contacts', ContactController::class);
Route::post('contacts/import-xml', [ContactController::class, 'importXML'])->name('contacts.import.xml');