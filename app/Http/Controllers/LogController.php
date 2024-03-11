<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogController extends Controller
{
    public function index(){
        $logPath = storage_path('logs/laravel.log');
        if (file_exists($logPath)){

            return response()->file($logPath);

        }else{
            return response()->json([
                "Message" => 'no log available'
            ], 400);
        }

    }
}

