<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class UploadFileController extends Controller
{
    //
    public function showForm(){
    
        return view('upload-file.showform');

    }



    public function handleUpload(Request $request){
      //  $file = $request->file('fileToUpload');
 
      //  $name = $file->getClientOriginalName();
       // $extension = $file->getClientOriginalExtension();
      //  Storage::put('example.txt',$request->file('fileToUpload'));
    //   $file = $request->file('fileToUpload');

    //     $name = $file->getClientOriginalName();

    //     $path = 'ahihi/kiki/' . $name;

    //     Storage::put($path, $file);
    $file = $request->file('fileToUpload');

        $folder = 'ahihi/kiki';

        $filePathAfterUpload = Storage::put($folder, $file);

        $filePathAfterUpload = 'storage/' . $filePathAfterUpload;

        return view('upload-file.showform',compact('filePathAfterUpload'));
        
    }
}
