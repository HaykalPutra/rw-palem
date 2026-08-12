<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|image|max:5120', // 5 MB
        ]);

        $path = $request->file('file')->store('uploads', 'public');

        // Use request root so URL is always correct regardless of APP_URL setting
        return response()->json([
            'url' => $request->root() . '/storage/' . $path,
        ]);
    }
}
