<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\Users;
use DB;
use App\Mail\SendToken;
use Mail;

class UserController extends Controller
{
    public function index(Request $request, $token){

        $query=Users::where('token', '=', $token)->first();

        if( isset($query) ){
            $result =  DB::select("SELECT *, HEX(AES_ENCRYPT(id, 'Quetzalcoatl.21')) as tk FROM users WHERE token = '$token'");
            
            $query->token=$result[0]->tk;
            $query->save();

            $response['row']['data']['login']=true;
            $response['row']['data']['user']=$result[0];
        }else{
            $response['row']['data']['login']=false;  
        }
        
        return Response::JSON($response);
    }

    // registrar
    public function register(Request $request){

        if($request->input('phone') && $request->input('email') && $request->input('name')
        && $request->input('surname') && $request->input('direction') && $request->input('location') 
        && $request->input('token')){

        $result = DB::table('users')
            ->where('email', $request->input('email'))
            ->get();

        if(isset($result[0])){

            $response['row']['data']['message']= false;
        }else{
            $user = new Users();

            $user->phone=$request->input('phone');
            $user->email=$request->input('email');
            $user->name=$request->input('name');
            $user->surname=$request->input('surname');
            $user->direction=$request->input('direction');
            $user->location=$request->input('location');
            $user->token=$request->input('token');
            $user->save();

            $response['row']['data']['message']=true;
        }


    }else{
        $response['row']['data']['message']=false;  
    }
    
    return Response::JSON($response);
    }

    // se envia el codigo
    public function sendToken(Request $request ,$token, $email){

        $query=Users::where('email', '=', $email)->first();

        if(isset($query)){
 
            $query->token=$token;
            $query->save();

            Mail::to($email)->send(new SendToken($token));
            $response['row']['data']['message']='email enviado';             

        }else{
            $response['row']['data']['message']='Email no esta registrado';  
        }

        return Response::JSON($response);
    }

    public function email(Request $request, $email, $token){

        Mail::to($email)->send(new SendToken($token));

        $response['row']['data']['message']='email enviado';  
        return Response::JSON($response);
    }

    public function Edit(Request $request){
        $query=Users::where('id', '=', $request->input('id'))->first();
        if(isset($query)){

            $query->phone=$request->input('phone');
            $query->email=$request->input('email');
            $query->name=$request->input('name');
            $query->surname=$request->input('surname');
            $query->direction=$request->input('direction');
            $query->location=$request->input('location');
            $query->save();

            $result=Users::where('id', '=', $request->input('id'))->first();
            
            $response['row']['data']['message']= 'Guardado Correctamente';
            $response['row']['data']['user']= $result;
        }else{
            $response['row']['data']['message']= 'No se Encontro el usuario';
            $response['row']['data']['user']= '';
        }

        return Response::JSON($response);
    }

    public function EditDir(Request $request){
        $query=Users::where('id', '=', $request->input('id'))->first();
        if(isset($query)){
            
            $query->direction=$request->input('direction');
            $query->location=$request->input('location');
            $query->save();

            $result=Users::where('id', '=', $request->input('id'))->first();
            
            $response['row']['data']['message']= 'Guardado Correctamente';
            $response['row']['data']['user']= $result;
        }else{
            $response['row']['data']['message']= 'No se Encontro el usuario';
            $response['row']['data']['user']= '';
        }

        return Response::JSON($response);
    }

}
