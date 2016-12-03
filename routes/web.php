<?php

Route::get('/', function () {
    return view('welcome');
});
Route::get('/stocks',function(){
    return view('stocks');
});