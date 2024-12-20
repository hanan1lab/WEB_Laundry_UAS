<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PembelianResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginnController extends Controller
{
    public function Login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user= User:: where("email",$request->email)->first();
        if(!$user || !Hash::check($request->password,$user->password)){
            return new PembelianResource(False,"Password salah",401); 
        }

        $Token=$user->createToken("auth_token",
        $user->getAllPermissions()->pluck("name")->toArray())->plainTextToken;
        return new PembelianResource(true,"Berhasil",[
            "Token"=>$Token,
            "Hak"=>$user->load("roles")
        ]);
    }

    public function Logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return new PembelianResource(true,"Berhasil Logout",202);
    }
}
