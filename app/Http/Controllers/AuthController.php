<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\HttpResponce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequset;

class AuthController extends Controller
{
    use HttpResponce;

        public function login(LoginUserRequest $requset)
        {
            $requset->validated($requset->all());

            if(!Auth::attempt($requset->only('email','password')))
            {
                return $this->error('','u can not acsses here',401);
            }
            $user=User::where('email', $requset->email)->first();

            return $this->sucsess([
                'user'=>$user,
                'token'=>$user->createToken('Api of token'.$user->name)->plainTextToken
            ]);

           /*


*/


        }

        public function regester(StoreUserRequset $requset){

            $requset->validated($requset->all());
            $user=User::create([
                'name'=>$requset->name,
                'email'=>$requset->email,
                'password'=>Hash::make($requset->password)
            ]);
            return $this->sucsess([
                'user'=>$user,
                'token'=>$user->createToken('Api of token'.$user->name)->plainTextToken
            ]);

        }
        public function logout(){
             Auth::user()->currentAccessToken()->delete();
             return $this->sucsess(
                [
                    'message'=>'api token delete successfully'
                ]
                );
        }




}
