<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\NewsCategory;
use Illuminate\Http\Request;

class NewsCategoryController extends Controller
{
    public function index()
    {
        $list_new_ctg = NewsCategory::all();
        return view("admin.newscategory.list", compact("list_new_ctg"));
    }

    public function add()
    {
        return view("admin.newscategory.add");
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $request->validate(
            [
                "new_ctg_name" => "required|regex:/^[\p{L}0-9 ]+$/u"
            ],
            [
                "new_ctg_name.required" => "Tên danh mục tin tức đang trống",
                "new_ctg_name.regex" => "Không được chứa ký tự đặc biệt"
            ]
        );

        $is_insert = NewsCategory::insert(
            [
                "ten_danhmuc_tintuc" => $data["new_ctg_name"]
            ]
        );

        if ($is_insert) {
            return redirect()->route("admin.new-ctg.add")->with("success", "Thêm danh mục tin tức mới thành công");
        } else {
            return redirect()->route("admin.new-ctg.add")->with("error", "Thêm danh mục tin tức mới thất bại");
        }
    }

    public function detail(Request $request, $id)
    {
        $request->session()->put("id_new_ctg", $id);

        $new_ctg_detail = NewsCategory::findOrfail($id);
        return view("admin.newscategory.edit", compact("new_ctg_detail"));
    }

    public function edit(Request $request)
    {
        $id = session("id_new_ctg");
        $data = $request->all();

        $request->validate(
            [
                "new_ctg_name" => "required|regex:/^[\p{L}0-9 ]+$/u"
            ],
            [
                "new_ctg_name.required" => "Tên danh mục tin tức đang trống",
                "new_ctg_name.regex" => "Không được chứa ký tự đặc biệt"
            ]
        );

        $is_update = NewsCategory::findOrFail($id)->update(
            [
                "ten_danhmuc_tintuc" => $data["new_ctg_name"]
            ]
        );

        if ($is_update) {
            return redirect()->route("admin.new-ctg.detail", ["id" => $id])->with("success", "Sửa danh mục tin tức thành công");
        } else {
            return redirect()->route("admin.new-ctg.detail", ["id" => $id])->with("error", "Sửa danh mục tin tức thất bại");
        }
    }

    public function delete($id)
    {
        $is_delete = NewsCategory::findOrFail($id)->delete();

        if ($is_delete) {
            return redirect()->route("admin.new-ctg")->with("success", "Xoá danh mục tin tức thành công");
        } else {
            return redirect()->route("admin.new-ctg")->with("error", "Xoá danh mục tin tức thất bại");
        }
    }
}
