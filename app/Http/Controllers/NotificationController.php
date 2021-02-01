<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\Notification;
use DB;


class NotificationController extends Controller
{
    public function getNotificacion(Request $request, $id){

        $query=Notification::where('id_user', '=', $id)->get();

        if( isset($query) ){
            $response['row']['data']=$query;
            
        }else{

            $response['row']['data']='';  
        }
        
        return Response::JSON($response);
    }

    public function getCount(Request $request, $id){

        $query=Notification::where('id_user', '=', $id)->get();

        $cont=0;
        if( isset($query) ){
                    
            foreach ($query as $g) {
                if($g->leido==0){
                    $cont++;
                }
                
            }

            $response['row']['data']=$cont;
            
        }else{

            $response['row']['data']=$cont;  
        }
        
        return Response::JSON($response);
    }

    public function leidos(Request $request, $id){

        $query=Notification::where('id_user', '=', $id)->get();
        
        $cont=0;
        if( isset($query) ){
            foreach ($query as $g) {
                if($g->leido==0){
                    $result=Notification::where('id', '=', $g->id)->first();       
                    $result->leido=1;
                    $result->save();
                }
                
            }

            $response['row']['data']=true;
            
        }else{

            $response['row']['data']=false;  
        }
        
        return Response::JSON($response);
    }
}
