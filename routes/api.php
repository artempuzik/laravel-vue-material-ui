<?php
use App\Http\Controllers\DataController;
use Illuminate\Support\Facades\Route;

Route::get('/files', [DataController::class, 'index']);
