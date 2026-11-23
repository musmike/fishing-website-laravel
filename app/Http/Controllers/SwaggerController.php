<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SwaggerController extends Controller
{
    public function index()
    {
        return view('swagger');
    }

    public function json()
    {
        $path = base_path('docs/swagger.json');
        if (File::exists($path)) {
            return response(file_get_contents($path), 200, ['Content-Type' => 'application/json']);
        }
        return response()->json(['error' => 'Swagger specification file not found'], 404);
    }
}
