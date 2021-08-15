<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PendingBills extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pending_bills', function (Blueprint $table) {
            $table->integer('id',10)->primary()->autoIncrement();
            $table->integer('bill_id');
            $table->integer('user_id');
            $table->integer('status');
            $table->date('bill_due_date');

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
