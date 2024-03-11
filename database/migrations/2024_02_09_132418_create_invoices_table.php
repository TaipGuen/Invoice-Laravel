<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('invoice', function (Blueprint $table) {
            $table->id('invoiceID');
            $table->unsignedBigInteger('userID');
            $table->foreign('userID')->references('userID')->on('user')->cascadeOnDelete();
            $table->date('invoice_date');
            $table->date('due_date');
            $table->float('invoice_amount',8,2);
            $table->enum('status',['paid','unpaid']);
            $table->float('total',8,2);
            $table->integer('tax_rate');
            $table->float('tax_amount',8,2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
