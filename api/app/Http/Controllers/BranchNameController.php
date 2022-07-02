<?php

namespace App\Http\Controllers;

use App\Models\BranchName;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BranchNameController extends Controller
{
    //
    public function getUserLogin(Request $request) {
        $data = BranchName::where('bet_side', 'MOBILE')
                            ->where('user_name', $request->email)
                            ->where('pass_word', $request->password)
                            ->first();

        if (!$data) {
            return response()->json(['message' => 'Unauthenticated.'], 401);
        } 
        
        return response()->json(['data' => $data, 'message' => 'success'], 200);
    }

}
