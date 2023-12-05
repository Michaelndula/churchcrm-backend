<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class MobileApiController extends Controller
{
    public function fetchData()
    {
        $data = User::all(); 
        return response()->json($data);
    }
}
