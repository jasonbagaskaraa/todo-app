<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::view('', 'dashboard')-> name('dashboard');

Route::get('/dashboard', function(){
    return view('dashboard'); 
});



Route::controller(TaskController::class)->group(function(){
    Route::get('/task', 'index');
});

// Route::get('/task/{id?}', function (string $id = null) {
//     return "task id = $id";
// })
// ->where('id', '\d{4,}')
// ;

Route::get('/search/{search}', function(string $search) {
    return "search $search";
})
->where('search', '.+')
;

Route::fallback(function () {
    return "halaman tidak ditemukan";
});