<?php

namespace App\Imports;

use App\Models\Invoice;
use App\Models\Item;
use Illuminate\Support\Facades\Log;


class Import
{



    public function index($path)
    {
        collect(file($path))->skip(1)->each(function(string $line){
            $row =str_getcsv($line,',');

            try {

                $invoice = new Invoice([
                    'invoiceID' => (int)$row[0],
                    'userID' => (int)$row[1],
                    'invoice_date' => $row[2],
                    'due_date' => $row[3],
                    'invoice_amount' => (float)$row[4],
                    'status' => $row[5],
                    'total' => (float)$row[6],
                    'tax_rate' => (int)$row[7],
                    'tax_amount' => (float)$row[8]
                ]);

                $invoice->save();

            }catch (\Exception $e){
                if (count($row) != 15){
                    Log::error('Falsches CSV Format sie sollte so sein:["invoiceID","userID","invoice_date","due_date","invoice_amount","status","total","tax_rate","tax_amount","itemID","invoiceID","productID","amount","quantity","paid"]'.PHP_EOL."CSV: ".json_encode($row) );
                }
                Log::error("Fehler beim Importieren von Invocie: ".$e->getMessage());
            }

            try {


                $item = new Item([
                    'itemID' => (int)$row[9],
                    'invoiceID' => (int)$row[0],
                    'productID' => (int)$row[11],
                    'amount' => (float)$row[12],
                    'price' => (float)$row[14],
                    'quantity' => (int)$row[13],
                ]);

                $item->save();


            }catch (\Exception $e){
                if (count($row) != 15){
                    Log::error('Falsches CSV Format sie sollte so sein:["invoiceID","userID","invoice_date","due_date","invoice_amount","status","total","tax_rate","tax_amount","itemID","invoiceID","productID","amount","quantity","paid"]'.PHP_EOL."CSV: ".json_encode($row) );
                }
                Log::error("Fehler beim Importieren von Item: ".$e->getMessage());
            }
        });
    }


    public function import($path){

    }
}
