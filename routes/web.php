<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

// Admin
Route::prefix("admin")->group(function() {
    // Admin Category
    Route::get("category", [CategoryController::class, "index"])->name("admin.category");
    Route::get("add-category", [CategoryController::class, "add"])->name("admin.category.add");
    Route::post("post-add-category", [CategoryController::class, "store"])->name("admin.category.store");
    Route::get("category-detail/{id}", [CategoryController::class, "detail"])->name("admin.category.detail");
    Route::post("post-edit-category", [CategoryController::class, "edit"])->name("admin.category.edit");
    Route::get("delete-category/{id}", [CategoryController::class, "delete"])->name("admin.category.delete");
});