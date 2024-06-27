<?php

use App\Http\Controllers\API\V1\User\UserController;
use Illuminate\Support\Facades\Route;


Route::prefix("/user")->group(function () {
    Route::post("/register", [UserController::class, "register"]);

    Route::post("/auth", [UserController::class, "auth"]);

    Route::middleware("auth:sanctum")->group(function () {
        Route::get("/", [UserController::class, "get"]);

        Route::patch("/update", [UserController::class, "update"]);

        Route::delete("/delete", [UserController::class, "delete"]);
    });
});
