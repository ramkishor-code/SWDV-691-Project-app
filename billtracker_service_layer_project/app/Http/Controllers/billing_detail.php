<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\db;

use Illuminate\Http\Request;

class billing_detail extends Controller
{
    public function showbill($id)
    {
        $result=DB::select('select * from billing_details where bill_id = ?', [$id]);
         return response()->json($result, 200);
    }
    public function createbill(Request $req)
    {
    //    $result=DB::unprepared("insert into billing_details (user_id,bill_name,bill_amount,bill_category,bill_cycle_day,bill_due_day,bill_validity_date,billing_status) values (".$req->user_id.",".$req->bill_name.",$req->bill_amount,$req->bill_category,$req->bill_cycle_day,$req->bill_due_day,'$req->bill_validity_date',$req->billing_status");
 try{
       $result=DB::table('billing_details')->insertGetId([
        'user_id'=>$req->user_id,
        'bill_name' => $req->bill_name,
        'bill_amount'=>$req->bill_amount,
        'bill_category' => $req->bill_category,
        'bill_cycle_day'=>$req->bill_cycle_day,
        'bill_due_day'=>$req->bill_due_day,
        'bill_validity_date'=>$req->bill_validity_date,
        'billing_status'=>$req->billing_status
        ]);
    
       
        if($result)
        {
            // $id=DB::select('select * from billing_details where bill_id = ?', []);
            // $data=[];
                $data=
                [
               'response'=>1,     
               'last_insert_id'=>$result,
                ];
            return  response()->json($data, 200);
        }else{
            return  response()->json($result, 200);
        }
    }
    catch(\Illuminate\Database\QueryException $ex){

        $data=
        [
            'response'=>0,     
       'last_insert_id'=>null,
        ];
        return  response()->json($data, 200);   
    }

    }

    public function editbill(Request $req){
     
        try{

          
           

                     $result=DB::table('billing_details')->where('bill_id',$req->bill_id)->update(array(
                        'user_id'=>$req->user_id,
                        'bill_name' => $req->bill_name,
                        'bill_amount'=>$req->bill_amount,
                        'bill_category' => $req->bill_category,
                        'bill_cycle_day'=>$req->bill_cycle_day,
                        'bill_due_day'=>$req->bill_due_day,
                        'bill_validity_date'=>$req->bill_validity_date,
                        'billing_status'=>$req->billing_status
                     ));    
                     if($result)
        {
            // $id=DB::select('select * from billing_details where bill_id = ?', []);
            // $data=[];
                $data=
                [
               'response'=>1,     
               'last_insert_id'=>$result,
                ];
            return  response()->json($data, 200);
        }else{
            return  response()->json($result, 200);
        }   
        }catch(\Illuminate\Database\QueryException $ex){
           

        $data=
        [
            'response'=>0,     
       
        ];
        return  response()->json($data, 200); 
        }


    }
    public function deletebill($id){
        $result=DB::unprepared('delete from billing_details where bill_id='.$id);
        if($result){
            $data=
            [
                'response'=>1,     
           
            ];
            return  response()->json($data, 200); 
        }else{
            $data2=
            [
                'response'=>0,     
           
            ];
            return  response()->json($data2, 200); 
        }
    }

}
