<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $list_ctg = Category::all();
        return view("admin.category.list", compact("list_ctg"));
    }

    public function add()
    {
        return view("admin.category.add");
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $request->validate(
            [
                "ctg_name" => "required|regex:/^[\p{L}0-9 ]+$/u"
            ],
            [
                "ctg_name.required" => "Tên danh mục đang trống",
                "ctg_name.regex" => "Không được chứa ký tự đặc biệt"
            ]
        );

        $is_insert = Category::insert(
            [
                "ten_danh_muc" => $data["ctg_name"]
            ]
        );

        if ($is_insert) {
            return redirect()->route("admin.category.add")->with("success", "Thêm danh mục mới thành công");
        } else {
            return redirect()->route("admin.category.add")->with("error", "Thêm danh mục mới thất bại");
        }
    }

    public function detail(Request $request, $id)
    {
        $request->session()->put("id_ctg", $id);

        $ctg_detail = Category::findOrfail($id);
        return view("admin.category.edit", compact("ctg_detail"));
    }

    public function edit(Request $request)
    {
        $id = session("id_ctg");
        $data = $request->all();

        $request->validate(
            [
                "ctg_name" => "required|regex:/^[\p{L}0-9 ]+$/u"
            ],
            [
                "ctg_name.required" => "Tên danh mục đang trống",
                "ctg_name.regex" => "Không được chứa ký tự đặc biệt"
            ]
        );

        $is_update = Category::findOrFail($id)->update(
            [
                "ten_danh_muc" => $data["ctg_name"]
            ]
        );

        if ($is_update) {
            return redirect()->route("admin.category.detail", ["id" => $id])->with("success", "Sửa danh mục thành công");
        } else {
            return redirect()->route("admin.category.detail", ["id" => $id])->with("error", "Sửa danh mục thất bại");
        }
    }

    public function delete($id)
    {
        $is_delete = Category::findOrFail($id)->delete();

        if ($is_delete) {
            return redirect()->route("admin.category")->with("success", "Xoá danh mục thành công");
        } else {
            return redirect()->route("admin.category")->with("error", "Xoá danh mục thất bại");
        }
    }
}
