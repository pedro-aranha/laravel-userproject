<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Js;

class UserController extends Controller
{
    public function Index(): JsonResponse {
        $users = User::orderBy('id', 'DESC')->paginate('1');
         //paginate function parameter is the amount of entries you want to have on each page
        //?page=x X being the number of the page you want to search 
        return response()->json([
            'status' =>true,
            'users' => $users
        ],200);
    }


    public function show(User $user): JsonResponse {
        //TODO: Implement a ID validation to check if user exists or not, to avoid throwing errors on the request
        return response()->json([
           'status' =>true,
           'users' => $user
        ],200);
    }
    public function store(Request $request) {
        DB::beginTransaction();
        try{
         $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password
            ]);
            DB::commit(); //commit into db

            return response()->json([
                'status' =>true,
                'message' => 'User created!',
                'user' =>$user
            ],201);
        }catch(Exception $e){
            DB::rollBack();
            return response()->json([
                'status' =>true,
                'message' => 'Error!'
            ],400);
        }
    }
}
