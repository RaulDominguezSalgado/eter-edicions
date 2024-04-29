<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Exception;

class UploadManager extends Controller
{
    function uploadFile($file, string $path, string $goalFilename){

        $destinationPath = $path;
        try{
            $file->move($destinationPath, $goalFilename);
        }
        catch(Exception $e){
            abort(500, 'Server Error');
        }
    }
}
