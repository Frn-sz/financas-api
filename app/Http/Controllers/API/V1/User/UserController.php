<?php

namespace App\Http\Controllers\API\V1\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function register(Request $req)
    {
        $req->validate(
            [
                "name" => "required",
                "email" => "required|unique:users",
                "password" => "required|confirmed"
            ]
        );

        $user = User::create([
            "name" => $req->get("name"),
            "email" => $req->get("email"),
            "password" => Hash::make($req->get("password"))
        ]);

        return response()->json(["accessToken" => $user->createToken("AccessToken")->plainTextToken], 201);
    }
}
