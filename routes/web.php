<?php

use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Course\CourseController;
use Illuminate\Support\Facades\Route;

Route::get("/", [UserController::class, "index"])->name("/");

Route::prefix("user")->group(function () {
    Route::get("/", [UserController::class, "index"])->name("user./");
    Route::get("add-user", [UserController::class, "add"])->name("user.add");
    Route::post("post-user", [UserController::class, "store"])->name("user.store");
    Route::get("user-detail/{id}", [UserController::class, "detail"])->name("user.detail");
    Route::put("update-user", [UserController::class, "update"])->name("user.update");
    Route::get("delete-user/{id}", [UserController::class, "delete"])->name("user.delete");
});

Route::prefix("course")->group(function () {
    Route::get("/", [CourseController::class, "index"])->name("course./");
    Route::get("add-course", [CourseController::class, "add"])->name("course.add");
    Route::post("post-course", [CourseController::class, "store"])->name("course.store");
    Route::get("course-detail/{id}", [CourseController::class, "detail"])->name("course.detail");
    Route::put("update-course", [CourseController::class, "update"])->name("course.update");
    Route::get("delete-course/{id}", [CourseController::class, "delete"])->name("course.delete");
});
    