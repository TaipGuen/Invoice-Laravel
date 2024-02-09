<?php

use App\Models\Invoice;
use App\Models\Product;
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
        Schema::create('item', function (Blueprint $table) {
            $table->id('itemID');
            $table->unsignedBigInteger('invoiceID');
            $table->unsignedBigInteger('productID');
            $table->foreign('invoiceID')->references('invoiceID')->on('invoice');
            $table->foreign('productID')->references('productID')->on('product')->cascadeOnDelete();
            $table->float('amount',8,2);
            $table->float('price',8,2);
            $table->integer('quantity');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
