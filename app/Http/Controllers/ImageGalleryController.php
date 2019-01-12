<?php
namespace gallery\Http\Controllers;

use Illuminate\Http\Request;
use gallery\Http\Models\ImageGallery;
use Intervention\Image\ImageManagerStatic as Image;

class ImageGalleryController extends Controller
{
    
    public function index()
    {
        return view('gallery')->with('images', ImageGallery::paginate(9));
    }
    
    public function upload(Request $request)
    {
        $this->validate($request, [
            'file' => 'image|required|mimes:jpeg,png,jpg,gif,svg'
        ]);
        $image = $request->file('file');
        $imageName = uniqid() . $image->getClientOriginalName();
        $path = storage_path('app\public\\');
        $image->move($path, $imageName);
/*        Image::make($path . $imageName)->resize(200, null, function ($constraint) {
            $constraint->aspectRatio();
        })
        ->save($path.'thumbs\\' . $imageName);*/
        
        Image::make($path . $imageName)->resize(240, 200)
        ->save($path.'thumbs\\' . $imageName);
        
        $imagemodel = new ImageGallery();
        $imagemodel->title = $request->title;
        $imagemodel->path = $imageName;
        $imagemodel->save();
        
        return back()->with('success', 'Your images has been successfully Upload');
    }
    
    public function showFiles()
    {
        echo '<img src="' . asset($contents) . '" />';
    }
}
