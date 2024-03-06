<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view("user.list", compact("users"));
    }

    public function add()
    {
        return view("user.add");
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $request->validate(
            [
                "name" => "required|min:3",
                "email" => "required|email|unique:users",
                "password" => "required|min:8",
                "image" => "required|mimes:png,jpg,jpeg"
            ],
            [
                "name.required" => "Name is not empty",
                "name.min" => "Name must has least :min character",
                "email.required" => "Email is not empty",
                "email.email" => "Email is invalid",
                "email.unique" => "Email already exists",
                "password.required" => "Password is not empty",
                "password.min" => "Password must has least :min character",
                "image.required" => "Image is not empty",
                "image.mimes" => "Just choose png, jpg, jpeg images"
            ]
        );

        if ($request->hasFile("image")) {
            $file = $request->image;
            $ext = $file->getClientOriginalExtension();
            $file_name = time() . "." . $ext;
            $file->storeAs("public", $file_name);
        }

        $data["image"] = $file_name;
        $data["password"] = bcrypt($data["password"]);

        $isInsert = User::insert(
            [
                "name" => $data["name"],
                "email" => $data["email"],
                "password" => $data["password"],
                "image" => $data["image"]
            ]
        );

        if ($isInsert) {
            return redirect()->route("user.add")->with("success", "User created susscessfully");
        } else {
            return redirect()->route("user.add")->with("error", "User created failed");
        }
    }

    public function detail(Request $request, $id)
    {
        $request->session()->put("id_user", $id);

        $userDetail = User::findOrfail($id);
        return view("user.update", compact("userDetail"));
    }

    public function update(Request $request)
    {
        $id = session("id_user");

        $data = $request->all();
        $getUser = User::findOrFail($id);

        $request->validate(
            [
                "name" => "required|min:3",
                "email" => "required|email|unique:users,email," . $id,
                "password" => "required|min:8",
                "image" => "mimes:png,jpg,jpeg"
            ],
            [
                "name.required" => "Name is not empty",
                "name.min" => "Name must has least :min character",
                "email.required" => "Email is not empty",
                "email.email" => "Email is invalid",
                "email.unique" => "Email already exists",
                "password.required" => "Password is not empty",
                "password.min" => "Password must has least :min character",
                "image.mimes" => "Just choose png, jpg, jpeg images"
            ]
        );

        if ($request->hasFile("image")) {
            $file = $request->image;
            $ext = $file->getClientOriginalExtension();
            $file_name = time() . "." . $ext;
            $file->storeAs("public", $file_name);
            $data["image"] = $file_name;
        } else {
            $data["image"] = $getUser->image;
        }

        $isUpdate = User::where('id', $id)->update(
            [
                "name" => $data["name"],
                "email" => $data["email"],
                "password" => $data["password"],
                "image" => $data["image"]
            ]
        );

        if ($isUpdate) {
            return redirect()->route("user.detail", ["id" => $id])->with("success", "User updated susscessfully");
        } else {
            return redirect()->route("user.detail", ["id" => $id])->with("error", "User updated failed");
        }
    }

    public function delete($id)
    {
        $isDelete = User::where('id', $id)->delete();

        if ($isDelete) {
            return redirect()->route("user./")->with("success", "User deleted successfully");
        } else {
            return redirect()->route("user./")->with("error", "User deleted failed");
        }
    }
}
