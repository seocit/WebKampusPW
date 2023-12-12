<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProdiController extends Controller
{
     public function index(){
        $prodi = Prodi::with('fakultas')->get();
        return response()->json($prodi, Response::HTTP_OK);
    }
}
