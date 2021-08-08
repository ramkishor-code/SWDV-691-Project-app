<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BillingDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        
        Schema::create('billing_detail', function (Blueprint $table) {
            $table->integer('bill_id',10)->primary()->autoIncrement();
            $table->unsignedInteger('user_id');
            $table->string('bill_name',50);
            $table->float('bill_amount',50,2);
            $table->Integer('bill_category');
            $table->Integer('bill_cycle_day');
            $table->Integer('bill_due_day');
            $table->date('bill_validity_date');
            $table->timestamp('created_at')->useCurrent();
            
            $table->timestamp('modified_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->unsignedInteger('billing_status');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
