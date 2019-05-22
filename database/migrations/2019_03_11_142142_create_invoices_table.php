<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            
            $table->bigIncrements('id');
            $table->string('invoice_no', 20)->index();
            $table->integer('room_id');
            $table->integer('branch_id');
            $table->enum('status', ['paid', 'unpaid'])->default('unpaid');
            $table->text('note')->nullable();
            $table->float('sub_total', 8, 2);
            $table->float('discount', 8, 2)->default(0);
            $table->float('total', 8, 2);
            $table->float('cash_receive', 8, 2);
            $table->float('cash_return', 8, 2);
            $table->integer('created_by');
            $table->integer('updated_by')->nullable();
            $table->integer('deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
