<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Js;

class UserController extends Controller
{
    public function Index(): JsonResponse {
        $users = User::orderBy('id', 'DESC')->paginate('5');
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
    
    public function store(UserRequest $request) : JsonResponse {
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

    public function update(UserRequest $request, User $user) : JsonResponse {

        DB::beginTransaction();
        
        try{
            $data = $request->only(['name', 'email', 'password']);

            // Update the user with the provided data
            $user->update($data);
            DB::commit(); //commit into db

            return response()->json([
                'status' =>true,
                'message' => 'User updated!',
                'user' =>$user
            ],200);
        }catch(Exception $e){
            DB::rollBack();
            return response()->json([
                'status' =>true,
                'message' => 'Error!'
            ],400);
        }
    }
    
}
