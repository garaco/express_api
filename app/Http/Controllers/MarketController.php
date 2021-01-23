<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\Market;
use DB;

class MarketController extends Controller
{
    public function save(Request $request){

        if($request->input('name_market') && $request->input('list') ){

            $save= new Market();

            $save->name_market  = $request->input('name_market');
            $save->list         = $request->input('list');
            $save->payment      = $request->input('payment');
            $save->direction    = $request->input('direction');
            $save->location     = $request->input('location');
            $save->status       = $request->input('status');
            $save->id_user      = $request->input('id_user');

            $save->save();

            $response['row']['data']['message']=true;


    }else{
        $response['row']['data']['message']=false;  
    }
    
    return Response::JSON($response);
    }
}
