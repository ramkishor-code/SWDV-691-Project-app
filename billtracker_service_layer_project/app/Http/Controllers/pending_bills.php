<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\db;
use Illuminate\Http\Request;

class pending_bills extends Controller
{
    public function show_upcoming_bill($id){
        $result=DB::select("
        SELECT p.id,c.category,p.bill_due_date,b.bill_name,b.bill_amount,b.bill_cycle_day,b.bill_due_day 
        FROM billing_details b
        JOIN pending_bills p ON b.bill_id=p.bill_id
        join category c on c.id=b.bill_category 
        WHERE b.bill_validity_date>NOW() AND DAY(NOW())<= b.bill_cycle_day AND status=1 and b.user_id=$id limit 4");

return  response()->json($result, 200);
    }
    public function show_upcoming_bill2($id){
        $result=DB::select("
        SELECT p.id,p.bill_cycle_date,c.category,p.bill_due_date,b.bill_name,b.bill_amount,b.bill_cycle_day,b.bill_due_day 
        FROM billing_details b
        JOIN pending_bills p ON b.bill_id=p.bill_id
        join category c on c.id=b.bill_category 
        WHERE b.bill_validity_date>NOW() AND DAY(NOW())<= b.bill_cycle_day AND status=1 and b.user_id=$id ");

return  response()->json($result, 200);
    }
    public function show_pending_bill($id){
        $result=DB::select("SELECT p.id,c.category,p.bill_due_date,b.bill_name,b.bill_amount,b.bill_cycle_day,b.bill_due_day FROM billing_details b
        JOIN pending_bills p ON b.bill_id=p.bill_id
        join category c on c.id=b.bill_category 
        WHERE b.bill_validity_date>NOW() AND DAY(NOW())> b.bill_due_day AND status=1 and b.user_id=$id limit 4");

return  response()->json($result, 200);
    }
    public function show_pending_bill2($id){
        $result=DB::select("SELECT p.bill_cycle_date,p.id,c.category,p.bill_due_date,b.bill_name,b.bill_amount,b.bill_cycle_day,b.bill_due_day FROM billing_details b
        JOIN pending_bills p ON b.bill_id=p.bill_id
        join category c on c.id=b.bill_category 
        WHERE b.bill_validity_date>NOW() AND DAY(NOW())> b.bill_due_day AND status=1 and b.user_id=$id ");

return  response()->json($result, 200);
    }
    

    public function status($id){
        $result=DB::unprepared("UPDATE pending_bills p SET STATUS=0 WHERE p.id=$id ");

return  response()->json($result, 200);
    }

    public function allactivebills($userid){
        $result=DB::select("
        SELECT CONCAT('Bill category : ',c.category,' and Due date : ',p.bill_due_date) as `desc`,DATE_FORMAT(p.bill_cycle_date, '%Y/%m/%d') as date,b.bill_name as title,b.bill_amount,b.bill_cycle_day,b.bill_due_day FROM billing_details b
        JOIN pending_bills p ON b.bill_id=p.bill_id
        join category c on c.id=b.bill_category 
        WHERE b.bill_validity_date>NOW()  AND status=1 and b.user_id=$userid ");
        return  response()->json($result, 200);
    }
    public function allactivebills2($userid){
        $result=DB::select("
        SELECT p.id,c.category,p.bill_cycle_date,b.bill_name,b.bill_amount,b.bill_cycle_day,p.bill_due_date,p.status
         FROM billing_details b
        JOIN pending_bills p ON b.bill_id=p.bill_id
        join category c on c.id=b.bill_category 
        WHERE b.bill_validity_date>NOW()  AND status=1 and b.user_id=$userid ");
        return  response()->json($result, 200);
    }
    public function categorygraph($userid){
        $result=DB::select("
        SELECT c.category AS label,sum(b.bill_amount) AS value FROM billing_details b
        JOIN pending_bills p ON b.bill_id=p.bill_id
        join category c on c.id=b.bill_category 
        WHERE MONTH(p.bill_cycle_date)=MONTH(NOW()) AND  b.user_id=$userid
		  GROUP BY c.id 
        ");
        $label=[];
        $data=[];
        $i=0;
   foreach($result as $key){
      $label[$i]=$key->label;
      $data[$i]=$key->value;
      $i++; 
   }
        return [
            
            "labels"=> $label,
            "datasets"=>[ array(
              
                "label"=> "Categories",
                "backgroundColor"=> "#f87979",
                "data"=>$data 
              
            )]
        
            ]; 

    }

    public function subscriber($email){
        $result=DB::table('subscriber')->insertGetId([
            'email'=>$email,
       
            ]);
        return  response()->json($result, 200);
    }
}
