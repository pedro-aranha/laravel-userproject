<?php

use App\Http\Controllers\api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*Route::get('/users', function (Request $request) {
    return response()->json([
        'status' =>true,
        'message' =>'ok'
    ],200);
});//->middleware('auth:sanctum');*/


Route::get('/users',[UserController::class,'index']); //GET http://127.0.0.1:8000/api/users | to get pagination add ?page-x being x the number of the page you want to get

Route::get('/users/{user}',[UserController::class, 'show']); //GET http://127.0.0.1:8000/api/users/{iduser}

Route::post('/users',[UserController::class, 'store']);