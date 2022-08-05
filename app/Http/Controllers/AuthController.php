<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

use function React\Promise\reduce;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;
use Throwable;

class AuthController extends Controller
{
    public function login(){
        return view('auth/login');
    }


    public function processLogin(Request $request){
        try{
            $user = User::query()
            ->where('email', $request->get('email'))

            ->firstOrFail();
            if(!
            Hash::check($request ->get('password') , $user->password)
            ){
                throw new Exception('Invalid password');
            }

            session()->put('id' , $user->id);
            session()->put('name' , $user->name);
            session()->put('avatar' , $user->avatar);
            session()->put('level' , $user->level);

            return redirect()->route('manufacture/index');
        }catch(\Throwable $e){
            return redirect()->route('login');
        }

    }

    public function logout(){
        session()->flush();

        return redirect()->route('login');
    }

    public function register(){
        return view('auth.register');
    }

    public function processRegister(Request $request){
        User::query()
        ->create([
            'name'=>$request->get('name'),
            'email'=>$request->get('email'),
            'password'=>Hash::make($request->get('password')),
            'level' =>0,
        ]);
     //   return view('auth.register');
    }
}
