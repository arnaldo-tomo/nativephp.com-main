<?php

use App\Http\Controllers\Api\LicenseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// routes/web.php
Route::get('/api/search-index', [App\Http\Controllers\SearchController::class, 'index']);
Route::get('/api/search', [App\Http\Controllers\SearchController::class, 'search']);
