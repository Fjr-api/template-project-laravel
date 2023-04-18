<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view("register", [
            "title" => "register"
        ]);
    }

    public function DoRegister(Request $request)
    {
        $user = $request->validate([
            "name" => "required",
            "password" => "required"
        ]);

        $user["password"] = Hash::make($user["password"]);

        User::create($user);
        return redirect("/login")->with("sukses", "register berhasill");
    }
}
