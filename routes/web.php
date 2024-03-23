<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DishController;
use Illuminate\Support\Facades\Route;

// Admin
Route::prefix("admin")->group(function () {
    // Admin Category
    Route::get("category", [CategoryController::class, "index"])->name("admin.category");
    Route::get("add-category", [CategoryController::class, "add"])->name("admin.category.add");
    Route::post("post-add-category", [CategoryController::class, "store"])->name("admin.category.store");
    Route::get("category-detail/{id}", [CategoryController::class, "detail"])->name("admin.category.detail");
    Route::put("post-edit-category", [CategoryController::class, "edit"])->name("admin.category.edit");
    Route::get("delete-category/{id}", [CategoryController::class, "delete"])->name("admin.category.delete");

    // Admin dish
    Route::get("dish", [DishController::class, "index"])->name("admin.dish");
    Route::get("add-dish", [DishController::class, "add"])->name("admin.dish.add");
    Route::post("post-add-dish", [DishController::class, "store"])->name("admin.dish.store");
    Route::get("dish-detail/{id}", [DishController::class, "detail"])->name("admin.dish.detail");
    Route::put("post-edit-dish", [DishController::class, "edit"])->name("admin.dish.edit");
    Route::get("delete-dish/{id}", [DishController::class, "delete"])->name("admin.dish.delete");
});
