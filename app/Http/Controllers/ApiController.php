<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    public function get_pelanggan(Request $r)
    {
        $data = Pelanggan::where('id', $r->id)->select(['email','sosmed'])->first();
        if(isset($data))
        {
            return Response::json(['data' => $data], 200);
        } else return abort(404);
    }

    public function api_get_token(Request $r)
    {
        if(Auth::attempt(['email' => $r->email, 'password' => $r->password])){
            $auth = Auth::user();
            $data['token'] = $auth->createToken('auth_token')->plainTextToken;

            return Response::json(['data' => $data], 200);
        }
    }
}
