<?php

use App\Http\Controllers\EmailPreviewController;
use Illuminate\Support\Facades\Route;

Route::get('api/v1/email/preview', EmailPreviewController::class);