<?php

use App\Http\Controllers\API\V1\User\UserController;
use Illuminate\Support\Facades\Route;

Route::post("/user/register", [UserController::class, "register"]);
