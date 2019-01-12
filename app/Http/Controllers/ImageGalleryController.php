<?php

namespace gallery\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageGalleryController extends Controller
{
    public function index() {
      return view('gallery') ;
    }
    
    public function upload(Request $request){
        $path = Storage::putFile('public', $request->file('file'));
        echo '<pre>';
       return var_dump($path);
        exit();
    }
    
    public function showFiles() {
       // $contents =storage_path();
        $contents = Storage::url('4saY5BO0jhJhn25Jtg06XHQdZ0XoNhmwWLSzF1hd.jpeg');
        echo $contents;
        //var_dump($contents);
        echo '<img src="'.asset($contents).'" />' ;
    }
}
