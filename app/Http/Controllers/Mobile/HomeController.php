<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index(){

        return response([

            'categories' => Category::all(),
            'courses'    => Course::where('status', 1)
                                ->with('categories')
                                ->with('level')
                                ->get()
                                ->map(function ($data){
                                    return [
                                        'name'      => $data->name,
                                        'category'  => $data->categories->map(function ($cat){
                                           return ['category'   =>  $cat->status ? $cat->name : 'Uncategorized'];
                                        }),
                                        'level'     => $data->level->name,
                                        'image'     => $data->image,
                                        'hours'     => $data->hours,
                                        'views'     => $data->views,
                                        'rating'    => $data->rating,
                                        'description' => $data->description
                                        ];
                                }
                                )
        ]);

    }

    public function loginCheck(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails())
        {
            return response(['errors'=>$validator->errors()->all()], 422);
        }
        $user = User::where('username', $request->username)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {

                $token = $user->guard(['user'])->createToken('Laravel Password Grant Client')->accessToken;

                return response(['token' => $token]);
            } else {
                $response = ["message" => "Password mismatch"];
                return response($response, 422);
            }
        } else {
            $response = ["message" =>'User does not exist'];
            return response($response, 422);
        }
    }
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required|confirmed'
        ]);

        $validatedData['password'] = Hash::make($request->password);

        $user = User::create($validatedData);

        $accessToken = $user->createToken('authToken')->accessToken;

        return response([ 'user' => $user, 'access_token' => $accessToken]);
    }
}
