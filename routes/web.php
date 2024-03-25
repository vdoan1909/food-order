<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\NewsCategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SideDishController;
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

    // Admin newscategory
    Route::get("new-ctg", [NewsCategoryController::class, "index"])->name("admin.new-ctg");
    Route::get("add-new-ctg", [NewsCategoryController::class, "add"])->name("admin.new-ctg.add");
    Route::post("post-add-new-ctg", [NewsCategoryController::class, "store"])->name("admin.new-ctg.store");
    Route::get("new-ctg-detail/{id}", [NewsCategoryController::class, "detail"])->name("admin.new-ctg.detail");
    Route::put("post-edit-new-ctg", [NewsCategoryController::class, "edit"])->name("admin.new-ctg.edit");
    Route::get("delete-new-ctg/{id}", [NewsCategoryController::class, "delete"])->name("admin.new-ctg.delete");

    // Admin news
    Route::get("news", [NewsController::class, "index"])->name("admin.news");
    Route::get("add-news", [NewsController::class, "add"])->name("admin.news.add");
    Route::post("post-add-news", [NewsController::class, "store"])->name("admin.news.store");
    Route::get("news-detail/{id}", [NewsController::class, "detail"])->name("admin.news.detail");
    Route::put("post-edit-news", [NewsController::class, "edit"])->name("admin.news.edit");
    Route::get("delete-news/{id}", [NewsController::class, "delete"])->name("admin.news.delete");

    // Admin side dish
    Route::get("side-dish", [SideDishController::class, "index"])->name("admin.side-dish");
    Route::get("add-side-dish", [SideDishController::class, "add"])->name("admin.side-dish.add");
    Route::post("post-add-side-dish", [SideDishController::class, "store"])->name("admin.side-dish.store");
    Route::get("side-dish-detail/{id}", [SideDishController::class, "detail"])->name("admin.side-dish.detail");
    Route::put("post-edit-side-dish", [SideDishController::class, "edit"])->name("admin.side-dish.edit");
    Route::get("delete-side-dish/{id}", [SideDishController::class, "delete"])->name("admin.side-dish.delete");
});
