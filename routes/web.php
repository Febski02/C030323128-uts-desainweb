<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileControler;

Route::get('/', [ProfileControler::class, 'tampil']);

