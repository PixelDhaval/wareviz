<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

Route::get('/test', function(){
    return response()->json(['message' => 'Hello World']);
});

require __DIR__.'/auth.php';
