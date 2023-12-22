<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Ramsey\Uuid\Uuid;
use Carbon\Carbon;
use Hash, Auth, Session, Redirect;
use App\Models\user, App\Models\Role, App\Models\State, App\Models\Gener;

class UserController extends Controller{

    function index(Request $request){
        try {
            $xhr_response = [];
            $xhr_response['status'] = 402;
            
            if(Auth::User()->role_id = 1){
               $u_ = User::whereUuid(Auth::User()->uuid)->with('role')->first();
               if($u_){
                    $xhr_response['status'] = 200;
                    $xhr_response['info'] = $u_;
                    $list_ = User::with('role','state','gener')->whereNotIn('uuid',[Auth::User()->uuid])->get();
                    if($list_){
                        $xhr_response['data'] = $list_;
                    }else{
                        $xhr_response['data'] = [];
                    }
               }else{
                    $xhr_response['info'] = [];
                    $xhr_response['data'] = [];
               }
               return view('user.list')->with(['response'=>$xhr_response]);

            }else{
                return "usuario normal";
            }

        } catch (\Throwable $th) {
         
        }
    }

    function edit(Request $request, $uuid ){
        try {
            
            $xhr_response = [];
            $xhr_response['status'] = 402;
            
            $u_ = User::whereUuid($uuid)->with('role','state','gener')->first();
            $r_ = Role::get();
            $s_ = State::get();
            $g_ = Gener::get();

            if($u_){
                $xhr_response['status'] = 200;
                $xhr_response['data'] = $u_;
            }else{
                $xhr_response['data'] = [];
                $xhr_response['message'] = 'Error, El usuario que intenta consultar no existe';
                return back()->with('message_error','usuario no encontrado');
            }

            $xhr_response['role'] = $r_;
            $xhr_response['state'] = $s_; 
            $xhr_response['gener'] = $g_; 
            return view('user.edit')->with(['response'=>$xhr_response]);

        } catch (\Throwable $th) {
            return back()->with('message_error','Error de acceso');
            // return redirect('/intra/users/items'); 
        }
    }

    function update(Request $request, $uuid){
        try {
           
            $validator = Validator::make($request->all(),[
                'identification' => 'required',
                'name' => 'required',
                'surname' => 'required'
            ]);
            
            if ($validator->fails()) {
                return response()->json($validator->errors(), Response::HTTP_BAD_REQUEST);
            }
            
            $fu_ = User::whereUuid($uuid)->first();
            if($fu_){
                
                $fu_->identification = $request->identification;
                $fu_->name = $request->name;
                $fu_->surname = $request->surname;
                $fu_->address = $request->address;
                $fu_->cellphone = $request->cellphone;
                $fu_->gener_id = $request->gener;

                if(Auth::User()->role_id==1){
                    $fu_->role_id = $request->role;
                    $fu_->status_id = $request->state;
                }

                $fu_->email = $request->email;

                if( $fu_->update()){
                    if(Auth::User()->role_id==1){
                        return redirect('/intra/users/items'); 
                    }else{
                        return redirect()->back()->with('message', 'Datos Actualizados Correctamente!');
                    }
                }else{
                    return back()->with('message_error','Error al intentar actualizar la información');
                }

            }else{
                return "no se encuentra el registro";
            } 
           
        } catch (\Throwable $th) {
            return $th;
            //throw $th;
        }
    }

    function save(Request $request){   
        try {
           
            $validator = Validator::make($request->all(),[
                'identification' => 'required',
                'name' => 'required',
                'surname' => 'required',
                'email' => 'required|email'
            ]);
            
            if ($validator->fails()) {
                return response()->json($validator->errors(), Response::HTTP_BAD_REQUEST);
            }
            
            $fu_ = User::whereIdentification($request->identification)->first();
            $userUuid = Uuid::uuid4();

            if(!$fu_){
                $u_ = new User;
                $u_->identification = $request->identification;
                $u_->name = $request->name;
                $u_->surname = $request->surname;
                $u_->password = bcrypt($request->identification);
                $u_->uuid = $userUuid;
                $u_->address = $request->address;
                $u_->cellphone = $request->cellphone;
                $u_->email = $request->email;
                $u_->gener_id = $request->gener;
                $u_->role_id = $request->role;
                $u_->status_id = $request->state;

                if( $u_->save()){
                    return redirect('/intra/users/items'); 
                }else{
                    return "No guardado ";
                }

            }else{
                return redirect('/intra/users/items/add');             
            } 
            
        } catch (\Throwable $th) {
            return $th;
            //throw $th;
        }
    }
    
    function add(){
        try {
            
            $xhr_response = [];
            $xhr_response['status'] = 402;
            $r_ = Role::get();
            $s_ = State::get();
            $g_ = Gener::get();
            $xhr_response['status'] = 200;
            $xhr_response['role'] = $r_;
            $xhr_response['state'] = $s_; 
            $xhr_response['gener'] = $g_; 

            return view('user.add')->with(['response'=>$xhr_response]);

        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    function security(Request $request,$uuid){
        try {
            if($uuid){
                $xhr_response = [];
                $xhr_response['status'] = 402;
                
                $u_ = User::whereUuid($uuid)->first();
                $xhr_response['status'] = 200;
                $xhr_response['info'] = $u_;

                return view('user.security')->with(['response'=>$xhr_response]);
            }
        } catch (\Throwable $th) {
            return redirect('/intra/dashboard'); 
        }
    }

    function security_save(Request $request,$uuid){
        try {
           
            $validator = Validator::make($request->all(),[
                'password' => 'required',
            ]);
            
            if ($validator->fails()) {
                return response()->json($validator->errors(), Response::HTTP_BAD_REQUEST);
            }

            if($request->password != $request->password_2){
                return redirect('/intra/users/security/'.$uuid); 
            }else{

                $fu_ = User::whereUuid($uuid)->first();
                if($fu_){
                    
                    $fu_->password = bcrypt($request->password);
                    if( $fu_->update()){
                        return redirect()->back()->with('message_security', 'Datos de securidad actualizados');
                        // return redirect('/intra/users/items/'.$uuid); 
                    }else{
                        return redirect('/intra/users/security/'.$uuid); 
                    } 
                }else{
                    return redirect('/intra/users/security/'.$uuid); 
                } 
            }             
        } catch (\Throwable $th) {
            return $th;
            //throw $th;
        }
    }

    function trash(Request $request){
        try {
            if($request->data_uuid){

                $trash = User::whereUuid($request->data_uuid)->first();
                if($trash){
                    $trash->delete();
                    $xhr_response = [];
                    $xhr_response['status'] = 200;
                    $xhr_response['url_redirect'] = '/intra/users/items';
                    $xhr_response['message'] = '';
                }else{
                    $xhr_response['status'] = 404;
                    $xhr_response['message'] = 'Error, No se pudo eliminar el usuario seleccionado';
                }
                return $xhr_response;
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    

}
