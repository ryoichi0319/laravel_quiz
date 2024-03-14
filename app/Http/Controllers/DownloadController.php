<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class DownloadController extends Controller
{  public function index()
    {
        $filePath = 'private/profile.png';

        $fileName = 'profile.png';
        
        $mimeType = Storage::mimeType($filePath);
        
        $headers = [['Content-Type' => $mimeType]];
        
        $disposition = 'attachment';
        
        return Storage::response($filePath, $fileName, $headers, $disposition);
    //
}
}