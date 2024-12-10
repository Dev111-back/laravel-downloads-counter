<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\File;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function index()
    {
        $files = File::all();
        return view('index', compact('files'));
    }

    public function download($id)
    {
        $file = File::findOrFail($id);

        $file->increment('downloads');

        return Storage::download($file->path, $file->name);
    }

    public function getDownloadCount($id)
    {
        $file = File::findOrFail($id);
        
        return response()->json(['downloads' => $file->downloads]);
    }


}
