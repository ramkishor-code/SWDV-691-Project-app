<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\db;
use Illuminate\Http\Request;

class pending_bills extends Controller
{
    public function show_upcoming_bill($id){
        $result=DB::select("SELECT c.category,p.bill_due_date,b.bill_name,b.bill_amount,b.bill_cycle_day,b.bill_due_day FROM billing_details b
        JOIN pending_bills p ON b.bill_id=p.bill_id
        join category c on c.id=b.bill_category 
        WHERE b.bill_validity_date>NOW() AND DAY(NOW())< b.bill_due_day AND b.user_id=$id limit 4");

return  response()->json($result, 200);
    }
}
