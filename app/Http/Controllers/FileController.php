<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function upload(Request $request)
    {
        if (empty($request->file('Invoice'))){

            return response()->json(['message' => 'Keine Datei zum Server Geschickt'], 404);
        }else{
            $date = date('d-m-y_h:i:s');

            $path = $request->file('Invoice')->storeAs("Uploads/csv_".$date.".csv");
            return response()->json(['message' => 'Datei erfolgreich hochgeladen'], 200);
        }

    }
}
