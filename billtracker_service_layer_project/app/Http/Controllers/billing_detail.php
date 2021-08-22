<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\db;
use Illuminate\Http\Request;
use Carbon\Carbon;

class billing_detail extends Controller
{

    public function category()
    {
        $result=DB::select('select id as value,category as text from category');
         return response()->json($result, 200);
    }
    public function showbill($id)
    {
        $result=DB::select('select * from billing_details where bill_id = ?', [$id]);
         return response()->json($result, 200);
    }
    public function showallbill($userid)
    {
        $result=DB::select('select * from billing_details b 
        JOIN category c ON b.bill_category=c.id
         where billing_status and user_id = ? ',[$userid]);
        
         return response()->json($result, 200);
    }
    public function createbill(Request $req)
    {
   
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
            $today1=Carbon::now('America/Los_Angeles');
      $date=$today1->toDateTimeString();
      $timestamp    = strtotime($date);
    
      $due_date = date(''.$req->bill_due_day.'-m-Y ', $timestamp);
      $cycle_date = date(''.$req->bill_cycle_day.'-m-Y ', $timestamp);
      $date=date_create($due_date);
      $due_date= date_format($date,"Y-m-d");

      $date3=date_create($cycle_date);
      $cycle_date= date_format($date3,"Y-m-d");

      $today=Carbon::today('America/Los_Angeles');
    if(true){
        $data=[
            'bill_id'=>$result,
            'user_id'=>$req->user_id,
            'status'=>$req->billing_status,
            'bill_due_date'=> $due_date,
            'bill_cycle_date'=>$cycle_date
      
          ];
                $result1=DB::table('pending_bills')->insertGetId($data);
    }
      
            
                $data2=
                [
               'response'=>1,     
               'last_insert_id'=>$result,
                ];
            return  response()->json($data2, 200);
        }else{
            return  response()->json($result, 200);
        }
    }
    catch(\Illuminate\Database\QueryException $ex){

        $data=
        [
            'response'=>0,     
       'last_insert_id'=>null,
       'error'=>'exception occured'
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
        $result=DB::unprepared('delete from pending_bills where bill_id='.$id);
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
