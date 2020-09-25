<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/chart/comments_chart', 'Backend\Api\ApiController@comments_chart');
Route::get('/chart/users_chart', 'Backend\Api\ApiController@users_chart');
