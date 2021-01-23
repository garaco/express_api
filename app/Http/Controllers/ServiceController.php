<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\Services;
use DB;

class ServiceController extends Controller
{
    public function save(Request $request){

        if($request->input('services') && $request->input('comment') ){

            $save = new Services();

            $save->services = $request->input('services');
            $save->comment  = $request->input('comment');
            $save->payment  = $request->input('payment');
            $save->status       = $request->input('status');
            $save->id_user  = $request->input('id_user');
            $save->save();

            $response['row']['data']['message']=true;


    }else{
        $response['row']['data']['message']=false;  
    }
    
    return Response::JSON($response);
    }
}
