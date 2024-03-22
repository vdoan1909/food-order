<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Dish;
use Illuminate\Http\Request;

class DishController extends Controller
{
    public function index()
    {
        //$list_dish = Dish::all();
        $list_dish = Dish::join('danh_muc', 'mon_an.id_the_loai', '=', 'danh_muc.id')->get();
        return view("admin.dish.list", compact("list_dish"));
    }

    public function add()
    {
        $list_ctg = Category::all();
        return view("admin.dish.add", compact("list_ctg"));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $request->validate(
            [
                "dish_name" => "required|min:3|regex:/^[\p{L}0-9 ]+$/u",
                "dish_price" => "required|numeric",
                "dish_img" => "required|mimes:png,jpg,jpeg,webp",
                "dish_des" => "required|min:10",
                "dish_ctg" => "required"
            ],
            [
                "dish_name.required" => "Tên món ăn đang trống",
                "dish_name.min" => "Tên món ăn cần có tối thiểu :min ký tự",
                "dish_name.regex" => "Tên món ăn không được có ký tự đặc biệt",
                "dish_price.required" => "Giá món ăn đang trống",
                "dish_price.numeric" => "Giá món ăn phải là 1 số",
                "dish_img.required" => "Ảnh món ăn đang trống",
                "dish_img.mimes" => "Ảnh được chọn phải có định dạng PNG, JPG, JPEG hoặc WEBP",
                "dish_des.required" => "Mô tả món ăn đang trống",
                "dish_des.min" => "Mô tả món ăn cần có tối thiểu :min ký tự",
                "dish_ctg.required" => "Thể loại món ăn đang trống"
            ]
        );

        if ($request->hasFile("dish_img")) {
            $file =  $request->dish_img;
            $ext = $file->getClientOriginalExtension();
            $file_name = time() . "." . $ext;
            $file->storeAs("public", $file_name);
        }

        $data["dish_img"] = $file_name;

        $is_insert = Dish::insert(
            [
                "ten_mon_an" => $data["dish_name"],
                "gia_mon_an" => $data["dish_price"],
                "anh_mon_an" => $data["dish_img"],
                "mo_ta" => $data["dish_des"],
                "id_the_loai" => $data["dish_ctg"]
            ]
        );

        if ($is_insert) {
            return redirect()->route("admin.dish.add")->with("success", "Thêm món ăn mới thành công");
        } else {
            return redirect()->route("admin.dish.add")->with("error", "Thêm món ăn mới thất bại");
        }
    }

    public function detail(Request $request, $id)
    {
        $dish_detail = Dish::join('danh_muc', 'mon_an.id_the_loai', '=', 'danh_muc.id')
            ->where('mon_an.id', $id)
            ->first();
        $list_ctg = Category::all();
        dd($dish_detail);
        die;
        return view("admin.dish.edit", compact("dish_detail", "list_ctg"));
    }
}
