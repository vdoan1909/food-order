<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Dish;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $list_dish = Dish::all();
        $list_dish_ctg = Category::all();
        return view("client.pages.home", compact("list_dish", "list_dish_ctg"));
    }

    public function menu()
    {
        $list_dish = Dish::all();
        $list_dish_ctg = Category::all();
        return view("client.pages.menu", compact("list_dish", "list_dish_ctg"));
    }

    public function detail(Request $request, $id)
    {
        $dish_detail = Dish::findOrFail($id);
        $list_dish_ctg = Category::all();
        $dish_detail->luot_xem += 1;
        $dish_detail->save();

        $related_dish = Dish::where('id_the_loai', $dish_detail->id_the_loai)
            ->where('id', '<>', $id)
            ->inRandomOrder()
            ->take(8)
            ->get();
        return view("client.pages.menudetail", compact("dish_detail", "list_dish_ctg", "related_dish"));
    }
}
