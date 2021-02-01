<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\TokenModel;
use DB;

class TokenController extends Controller
{
    public function generateToken(Request $request, $id, $token){

        $query=TokenModel::where('id_user', '=', $id)->first();

        if( isset($query) ){
            if($query->token_firebase!==$token){
                $query->token_firebase=$token;
                $query->save();
                $response['row']['data']['register_token']=true;
            }else{
                $response['row']['data']['register_token']=false;
            }
            
        }else{
            $insert = new TokenModel();
            $insert->id_user = $id;
            $insert->token_firebase=$token;
            $insert->save();
            $response['row']['data']['register_token']=true;  
        }
        
        return Response::JSON($response);
    }
}
