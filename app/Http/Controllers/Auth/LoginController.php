<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Hash, Auth, Session, Redirect;
use Ramsey\Uuid\Uuid;
use App\Models\User;

class LoginController extends Controller{
    
    function signIn(){
        return view('auth.signIn')->with([]);
    }

    function signInPost(Request $request) {
        try {
            $request->validate([
                'username' => 'required',
                'password' => 'required'
            ]);
            
            if(empty($request->username) || empty($request->password) ){
              $xhr_response = Array("status" => 402, "data" => "" , "message" => "Datos no procesados no pueden estar vacios");
            }else{
                $data_validate = User::whereIdentification($request->username)->first(['identification','password','role_id','status_id','uuid']);
                if(!empty($data_validate)){  
                    $attempt = Auth::attempt(['identification' => $request->username,'password' => $request->password ]); 
                    if($attempt){
                        if (Auth::check()){
                            if($data_validate->role_id != 1){
                                return redirect('/intra/users/items/'.$data_validate->uuid);
                            }else{
                                return redirect('/intra/users/items');     
                            }
                        }else{
                            $xhr_response = Array("status" => 402, "data" => "" , "message" => "Error de autenticado para esta cuenta");
                        }
                    }else{
                        $xhr_response = Array("status" => 402, "data" => "" , "message" => "Datos de acceso suministrados están errados, por favor inténtelo de nuevo");
                    }
                }else{
                    $xhr_response = Array("status" => 402, "data" => "" , "message" => "Datos de acceso suministrados están errados, por favor inténtelo de nuevo");
                }
            } 
            return redirect()->route('auth.singin')->with(['reponse' =>$xhr_response ]);
            
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('auth.singin'); 
        }
    }

    function logout(){
        Auth::logout();
        Session::flush();
        return Redirect::to('/auth/login');
    }

}