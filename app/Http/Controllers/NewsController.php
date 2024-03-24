<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $list_news = News::all();
        $list_new_ctg = NewsCategory::all();
        return view("admin.news.list", compact("list_news", "list_new_ctg"));
    }

    public function add()
    {
        $list_new_ctg = NewsCategory::all();
        return view("admin.news.add", compact("list_new_ctg"));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $request->validate(
            [
                "news_name" => "required|min:3|regex:/^[\p{L}0-9 ]+$/u",
                "news_des" => "required|min:10",
                "news_img" => "required|mimes:png,jpg,jpeg,webp",
                "news_ctg" => "required"
            ],
            [
                "news_name.required" => "Tên tin tức đang trống",
                "news_name.min" => "Tên tin tức cần có tối thiểu :min ký tự",
                "news_name.regex" => "Tên tin tức không được có ký tự đặc biệt",
                "news_des.required" => "Mô tả tin tức đang trống",
                "news_des.min" => "Mô tả tin tức cần có tối thiểu :min ký tự",
                "news_img.required" => "Ảnh tin tức đang trống",
                "news_img.mimes" => "Ảnh được chọn phải có định dạng PNG, JPG, JPEG hoặc WEBP",
                "news_ctg.required" => "Thể loại tin tức đang trống"
            ]
        );

        if ($request->hasFile("news_img")) {
            $file =  $request->news_img;
            $ext = $file->getClientOriginalExtension();
            $file_name = time() . "." . $ext;
            $file->storeAs("public", $file_name);
        }

        $data["news_img"] = $file_name;

        $is_insert = News::insert(
            [
                "ten_tin_tuc" => $data["news_name"],
                "mo_ta_tin_tuc" => $data["news_des"],
                "anh" => $data["news_img"],
                "id_danh_muc_tin_tuc" => $data["news_ctg"]
            ]
        );

        if ($is_insert) {
            return redirect()->route("admin.news.add")->with("success", "Thêm tin tức mới thành công");
        } else {
            return redirect()->route("admin.news.add")->with("error", "Thêm tin tức mới thất bại");
        }
    }

    public function detail(Request $request, $id)
    {
        $request->session()->put("id_news", $id);
        $news_detail = News::findOrFail($id);
        $list_new_ctg = NewsCategory::all();
        return view("admin.news.edit", compact("news_detail", "list_new_ctg"));
    }

    public function edit(Request $request)
    {
        $id = session("id_news");
        $data = $request->all();
        $get_news = News::findOrFail($id);

        $request->validate(
            [
                "news_name" => "required|min:3|regex:/^[\p{L}0-9 ]+$/u",
                "news_des" => "required|min:10",
                "news_img" => "mimes:png,jpg,jpeg,webp",
                "news_ctg" => "required"
            ],
            [
                "news_name.required" => "Tên tin tức đang trống",
                "news_name.min" => "Tên tin tức cần có tối thiểu :min ký tự",
                "news_name.regex" => "Tên tin tức không được có ký tự đặc biệt",
                "news_des.required" => "Mô tả tin tức đang trống",
                "news_des.min" => "Mô tả tin tức cần có tối thiểu :min ký tự",
                "news_img.mimes" => "Ảnh được chọn phải có định dạng PNG, JPG, JPEG hoặc WEBP",
                "news_ctg.required" => "Thể loại tin tức đang trống"
            ]
        );

        if ($request->hasFile("news_img")) {
            $file = $request->news_img;
            $ext = $file->getClientOriginalExtension();
            $file_name = time() . "." . $ext;
            $file->storeAs("public", $file_name);
            $data["news_img"] = $file_name;
        } else {
            $data["news_img"] = $get_news->anh;
        }

        $is_update = News::where('id', $id)->update(
            [
                "ten_tin_tuc" => $data["news_name"],
                "mo_ta_tin_tuc" => $data["news_des"],
                "anh" => $data["news_img"],
                "id_danh_muc_tin_tuc" => $data["news_ctg"]
            ]
        );

        if ($is_update) {
            return redirect()->route("admin.news.detail", ["id" => $id])->with("success", "Sửa tin tức thành công");
        } else {
            return redirect()->route("admin.news.detail", ["id" => $id])->with("error", "Sửa tin tức thất bại");
        }
    }

    public function delete($id){
        $is_delete = News::findOrFail($id)->delete();

        if ($is_delete) {
            return redirect()->route("admin.news")->with("success", "Xoá tin tức thành công");
        } else {
            return redirect()->route("admin.news")->with("error", "Xoá tin tức thất bại");
        }
    }
}
