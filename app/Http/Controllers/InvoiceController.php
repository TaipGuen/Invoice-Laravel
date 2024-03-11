<?php

namespace App\Http\Controllers;

use App\Imports\Import;
use App\Models\Invoice;
use Illuminate\Support\Facades\Log;


class InvoiceController extends Controller
{
    public function index()
    {
        $invoice = Invoice::with('item')->paginate(15);
        return response()->json($invoice);
    }

    public function test($name)
    {
        $score = random_int(0,100);
        return response()->json(['name' => $name,'score' => $score]);
    }

    public function show(int $id)
    {
        $invoice = Invoice::with('item')->find($id);

        if (!empty($invoice))
        {
            return response()->json($invoice);
        }
        else
        {
            return response()->json([
                "message" => "User not found"
            ],404);
        }
    }

    public function destroy($id)
    {
        $invoice = Invoice::with('item')->find($id);

        if (!empty($invoice)) {

            $invoice->delete();

            return response()->json([
                "message" => "Invoice deleted."
            ], 202);
        }
        else
        {
            return response()->json([
                "message" => "Invoice not found."
            ], 404);
        }
    }


    public function import()
    {
        $verzeichnis = 'storage/app/Uploads/';
        $pattern = $verzeichnis . '*.csv';
        $gefundeneDateien = glob($pattern);


        if (count($gefundeneDateien)>0){
            for ($i = 0; $i < count($gefundeneDateien); $i++)
            {
                Log::info("CSV: $gefundeneDateien[$i]");
                $importInvoice = new Import();
                $importInvoice->index($gefundeneDateien[$i]);
            }
            Log::info("CSVs wurden Importiert");
            return "true";
        }
        else
        {
            Log::info(storage_path('/app/Uploads/'));
            Log::error("CSV not found.");
            return "false";
        }

    }

}
