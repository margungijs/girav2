<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class APIController extends Controller
{
    public function Data(Request $request){
        $data = $request->input();

        return response()->json(['message' => 'Data received and processed successfully', 'data' => $data], 200);
    }
}
