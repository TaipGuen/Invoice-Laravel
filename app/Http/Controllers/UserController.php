<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(15);
        return response()->json($users);
    }

    public function show(int $id)
    {
        $user = User::find($id);
        if (!empty($user))
        {
            return response()->json($user);
        }
        else
        {
            return response()->json([
                "message" => "User not found"
            ],404);
        }
    }

    public function destroy($id)
    {
        $user=User::find($id);

        if (!empty($user)) {

            $user->delete();

            return response()->json([
                "message" => "User deleted."
            ], 200);
        }
        else
        {
            return response()->json([
                "message" => "User not found."
            ], 404);
        }
    }

    public function import(Request $request){
        try {
            $data = $request->toArray();
            $validator = Validator::make($data,[
                'firstname' => 'required',
                'lastname' => 'required',
                'sex' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'username' => 'required|unique:user',
                'password' => 'required',
                'birthdate' => 'required'
            ],
                [
                    'required' => 'Parameters are wrong',
                    'unique' => 'Record Already exists'
                ]);

            if ($validator->fails()){

                return response()->json($validator->errors()->getMessages(),status: 400);
            }else{
                $product = new User($validator->validated());
                $product->save();
                return response()->json([
                    "message" => "Successfully Uploaded."
                ], 200);
            }
        }catch(Exception $exception){
            return response()->json([
                "message" => $exception->getMessage()
            ], 500);
        }



    }
}
