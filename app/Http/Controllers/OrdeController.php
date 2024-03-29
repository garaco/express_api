<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\Ordes;
use DB;

class OrdeController extends Controller
{
    public function save(Request $request){

        if($request->input('comment_init') && $request->input('comment_final') ){

            $orde = new Ordes();

            $orde->direction_init=$request->input('direction_init');
            $orde->comment_init=$request->input('comment_init');
            $orde->location_init=$request->input('location_init');
            $orde->direction_final=$request->input('direction_final');
            $orde->comment_final=$request->input('comment_final');
            $orde->location_final=$request->input('location_final');
            $orde->status=$request->input('status');
            $orde->payment=$request->input('payment');
            $orde->id_user=$request->input('id_user');
            $orde->save();

            $response['row']['data']['message']=true;


    }else{
        $response['row']['data']['message']=false;  
    }
    
    return Response::JSON($response);
    }

    public function listAll(Request $request, $id){
        $result = DB::select("Select * from
        ((SELECT 'Mandado' as tipo, id, status, payment, create_at from orders where id_user = $id)
        UNION ALL
        (SELECT 'Compra' as tipo, id, status, payment, create_at from market where id_user = $id)
        UNION ALL
        (SELECT 'Servicio' as tipo, id, status, payment, create_at from services where id_user = $id)) as oms
        ORDER BY oms.create_at desc"); 

        $response['row']['data']=$result;

        return Response::JSON($response);
    }
}
