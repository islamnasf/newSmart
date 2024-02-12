<?php

namespace App\Http\Controllers;

use App\Http\Resources\userLoginResource;
use App\Http\Resources\userRegisterResource;
use App\Models\Apiuser;
use Illuminate\Http\Request;
//use Auth;
use Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Tymon\JWTAuth\Contracts\Providers\Auth as ProvidersAuth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function __construct(){
        $this->middleware('auth:api',['except'=>['login','register']]);
    }
    public function register(Request $request){
        $validator=Validator::make($request->all() ,[
            'name'=>'required',
            'phone'=>'required|unique:users|digits:8',
            'password'=>'required|min:3'
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>200,
                $validator->errors()],200
            );
        }
        $user_password = ['user_password' => $request->password];
        $group = ['group' => $request->group];
        $grade = ['grade' => $request->grade];
        $user=Apiuser::create(array_merge(
            $validator->validated()+$user_password+$group+$grade,
            ['password'=>bcrypt($request->password)]
        ));
        return response()->json([
            'status'=>200,
            'message'=>'User successfully registered',
            'user' =>$user
            // 'user'=>userRegisterResource::make($user)
        ],200);
    }

    public function login(Request $request){
        $validator=Validator::make($request->all(),[
            'phone'=>'required',
            'password'=>'required|min:3'
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>200,
                $validator->errors()],200
            );
        }
        if(!$token=auth()->attempt($validator->validated())){
            return response()->json([
                'status'=>200,
                'error'=>'Unauthorized'],
                200);
        }
        return $this->createNewToken($token);
    }
    public function createNewToken($token){
        return response()->json([
            'access_token'=>$token,
            'token_tybe'=>'bearer',
            'expires_in'=>auth()->guard('api')->factory()->getTTl()*600000,
           'user'=>auth()->user(),
            // 'user'=>userLoginResource::make(auth()->user())
        ]); 
    }
    public function profile(){
        return response()->json(auth()->user());
    }
    public function logout(){
        auth()->logout();
        
        return response()->json([
            'message'=>'User logged out',
        ],201);
    }
    public function update(Request $request)
    {
        $userId =Auth::id();
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'phone' => [
                'required',
                'unique:users,phone,' . $userId,
                'regex:/(01)[0-9]{9}/',
                'digits:11',
                'min:11',
                'max:11',
            ],
            'password'=>'required|min:3' 
        ]);
        try {
            $user = JWTAuth::parseToken()->authenticate();
            $user->update($request->all());
            return response()->json([
                'status'=>200,
                'message' =>'User updated successfully', 'user' => $user
            ]);
        } catch (\Exception $e) {
            return response()->json(['message' =>'Unable to update user', 'error' => $e->getMessage()], 500);
        }
    }
}
