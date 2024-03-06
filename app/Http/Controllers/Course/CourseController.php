<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use App\Models\Course\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view("course.list", compact("courses"));
    }

    public function add()
    {
        return view("course.add");
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $request->validate(
            [
                "name" => "required|min:3",
                "price" => "required|numeric",
                "image" => "required|mimes:png,jpg"
            ],
            [
                "name.required" => "Name is not empty",
                "name.min" => "Must have least :min character",
                "price.required" => "Price is not empty",
                "price.numeric" => "Price is invalid",
                "image.required" => "Image is not empty",
                "image.mimes" => "Just choose png, jpg images"
            ]
        );

        if ($request->hasFile("image")) {
            $file = $request->image;
            $ext = $file->getClientOriginalExtension();
            $file_name = time() . "." . $ext;
            $file->storeAs("public", $file_name);
        }

        $data["image"] = $file_name;

        $isInsert = Course::insert(
            [
                "name" => $data["name"],
                "price" => $data["price"],
                "image" => $data["image"]
            ]
        );

        if ($isInsert) {
            return redirect()->route("course.add")->with("success", "Course created successfully");
        } else {
            return redirect()->route("course.add")->with("error", "Course created failed");
        }
    }

    public function detail(Request $request, $id)
    {
        $request->session()->put("id_course", $id);

        $courseDetail = Course::findOrFail($id);
        return view("course.update", compact("courseDetail"));
    }

    public function update(Request $request)
    {
        $id = session("id_course");

        $data = $request->all();
        $getCourse = Course::findOrFail($id);

        $request->validate(
            [
                "name" => "required|min:3",
                "price" => "required|numeric",
                "image" => "mimes:png,jpg"
            ],
            [
                "name.required" => "Name is not empty",
                "name.min" => "Must have least :min character",
                "price.required" => "Price is not empty",
                "price.numeric" => "Price is invalid",
                "image.mimes" => "Just choose png, jpg images"
            ]
        );

        if ($request->hasFile("image")) {
            $file = $request->image;
            $ext = $file->getClientOriginalExtension();
            $file_name = time() . "." . $ext;
            $file->storeAs("public", $file_name);
            $data["image"] = $file_name;
        } else {
            $data["image"] = $getCourse->image;
        }

        $isUpdate = Course::where('id', $id)->update(
            [
                "name" => $data["name"],
                "price" => $data["price"],
                "image" => $data["image"]
            ]
        );

        if ($isUpdate) {
            return redirect()->route("course.detail", ['id' => $id])->with("success", "Course updated successfully");
        } else {
            return redirect()->route("course.detail", ['id' => $id])->with("error", "Course updated failed");
        }
    }

    public function delete($id){
        $isDelete = Course::where('id', $id)->delete();

        if($isDelete){
            return redirect()->route("course./")->with("success", "Course deleted successfully");
        }else{
            return redirect()->route("course./")->with("error", "Course deleted failed");
        }
    }
}
