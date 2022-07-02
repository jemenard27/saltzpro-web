<?php

namespace App\Http\Controllers\Query;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginUserController extends Controller
{
    //

    public function getUser(Request $request) {
        session('myName', 'Menard Catayas');
        $data = $request->session()->all();
        return $data;
    }

    public function getUserEmail(Request $request) {
        $data = Session::get('myName');
        return $data;
    }
}
