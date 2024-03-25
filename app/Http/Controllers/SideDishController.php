<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SideDish;
use Illuminate\Http\Request;

class SideDishController extends Controller
{
    public function index()
    {
        $list_side_dish = SideDish::all();
        return view("admin.sidedish.list", compact("list_side_dish"));
    }

    public function add()
    {
        return view("admin.sidedish.add");
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $request->validate(
            [
                "side_dish_name" => "required|regex:/^[\p{L}0-9 ]+$/u",
                "side_dish_img" => "required|mimes:png,jpg,jpeg,webp",
                "side_dish_price" => "required|numeric"
            ],
            [
                "side_dish_name.required" => "Tên món ăn phụ đang trống",
                "side_dish_name.regex" => "Tên món ăn phụ không được chứa ký tự đặc biệt",
                "side_dish_img.required" => "Ảnh món ăn phụ đang trống",
                "side_dish_img.mimes" => "Ảnh được chọn phải có định dạng PNG, JPG, JPEG hoặc WEBP",
                "side_dish_price.required" => "Giá món ăn phụ đang trống",
                "side_dish_price.numeric" => "Giá món ăn phụ phải là 1 số"
            ]
        );

        if ($request->hasFile("side_dish_img")) {
            $file =  $request->side_dish_img;
            $ext = $file->getClientOriginalExtension();
            $file_name = time() . "." . $ext;
            $file->storeAs("public", $file_name);
        }

        $data["side_dish_img"] = $file_name;

        $is_insert = SideDish::insert(
            [
                "ten_mon_phu" => $data["side_dish_name"],
                "anh_mon_phu" => $data["side_dish_img"],
                "gia_mon_phu" => $data["side_dish_price"]
            ]
        );

        if ($is_insert) {
            return redirect()->route("admin.side-dish.add")->with("success", "Thêm món ăn phụ mới thành công");
        } else {
            return redirect()->route("admin.side-dish.add")->with("error", "Thêm món ăn phụ mới thất bại");
        }
    }

    public function detail(Request $request, $id)
    {
        $request->session()->put("id_side_dish", $id);
        $side_dish_detail = SideDish::findOrFail($id);
        return view("admin.sidedish.edit", compact("side_dish_detail"));
    }

    public function edit(Request $request)
    {
        $id = session("id_side_dish");
        $data = $request->all();
        $get_side_dish = SideDish::findOrFail($id);

        $request->validate(
            [
                "side_dish_name" => "required|regex:/^[\p{L}0-9 ]+$/u",
                "side_dish_img" => "mimes:png,jpg,jpeg,webp",
                "side_dish_price" => "required|numeric"
            ],
            [
                "side_dish_name.required" => "Tên món ăn phụ đang trống",
                "side_dish_name.regex" => "Tên món ăn phụ không được chứa ký tự đặc biệt",
                "side_dish_img.mimes" => "Ảnh được chọn phải có định dạng PNG, JPG, JPEG hoặc WEBP",
                "side_dish_price.required" => "Giá món ăn phụ đang trống",
                "side_dish_price.numeric" => "Giá món ăn phụ phải là 1 số"
            ]
        );

        if ($request->hasFile("side_dish_img")) {
            $file =  $request->side_dish_img;
            $ext = $file->getClientOriginalExtension();
            $file_name = time() . "." . $ext;
            $file->storeAs("public", $file_name);
            $data["side_dish_img"] = $file_name;
        } else {
            $data["side_dish_img"] = $get_side_dish->anh_mon_phu;
        }


        $is_update = SideDish::where("id", $id)->update(
            [
                "ten_mon_phu" => $data["side_dish_name"],
                "anh_mon_phu" => $data["side_dish_img"],
                "gia_mon_phu" => $data["side_dish_price"]
            ]
        );

        if ($is_update) {
            return redirect()->route("admin.side-dish.detail", ["id" => $id])->with("success", "Sửa món ăn phụ mới thành công");
        } else {
            return redirect()->route("admin.side-dish.detail", ["id" => $id])->with("error", "Sửa món ăn phụ mới thất bại");
        }
    }

    public function delete($id){
        $is_delete = SideDish::findOrFail($id)->delete();

        if ($is_delete) {
            return redirect()->route("admin.side-dish")->with("success", "Xoá món ăn phụ thành công");
        } else {
            return redirect()->route("admin.side-dish")->with("error", "Xoá món ăn phụ thất bại");
        }
    }
}
