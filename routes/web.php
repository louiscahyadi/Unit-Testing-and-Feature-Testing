<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

Route::get('/', function () {
    return redirect('/articles');
});

Route::resource('articles', ArticleController::class);
