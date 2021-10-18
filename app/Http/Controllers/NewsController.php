<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NewsController extends Controller
{


    // GET API NEWS
    public function index(Request $request)
    {
        try {
            $response = Http::get("https://newsapi.org/v2/top-headlines", [
                'country' => 'us',
                'page' =>  (int)$request->page,
                'apiKey' => '2d021085c2e64c23927ff485d9f4299b'
            ]);
            return response()->json($response->json());
        } catch (Exception $e) {
            report($e);
            return response()->send($e->getMessage());
        }
    }
}
