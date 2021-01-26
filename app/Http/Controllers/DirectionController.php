<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\Direction;
use DB;

class DirectionController extends Controller
{
    public function add(Request $request){

        if($request->input('direction') && $request->input('location') ){

            $save= new Direction();

            $save->id_user      = $request->input('id_user');
            $save->direction    = $request->input('direction');
            $save->location     = $request->input('location');
            $save->save();

            $response['row']['data']['message']=true;
            $result=Direction::where('id_user', '=', $request->input('id_user'))->get();
            $response['row']['data']['direction']= $result;

    }else{
        $response['row']['data']['message']=false;  
    }
    
    return Response::JSON($response);
    }

    public function getByid(Request $request, $id){

        $response['row']['data']='';    

        $result=Direction::where('id_user', '=', $id)->get();
        if(isset($result)){
            $response['row']['data']=$result;    
        }

        return Response::JSON($response);
    }

    public function edit(Request $request)
    {
        $save=Direction::where('id', '=', $request->input('id'))->first();
        if(isset($save)){
            $save->direction    = $request->input('direction');
            $save->location     = $request->input('location');
            $save->save();

            $result=Direction::where('id_user', '=', $request->input('id_user'))->get();
            
            $response['row']['data']['direction']= $result;
        }else{
            $response['row']['data']['direction']= '';
        }

        return Response::JSON($response);
    }

    public function delete(Request $request){

        Direction::where('id', $request->input('id'))->delete();

        $result=Direction::where('id_user', '=', $request->input('id_user'))->get();

        $response['row']['data']['direction']= $result;

        return Response::JSON($response);
    }

}
