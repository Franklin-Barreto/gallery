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

        Image::make($path . $imageName)->resize(240, 200)->save($path . 'thumbs\\' . $imageName);
        $this->saveImage($request->title, $imageName);

        return back()->with('success', 'Your images has been successfully Upload');
    }

    public function download($id, $name)
    {
        $path = storage_path('app\public\\');
        $this->updateDownloadCount($id);
        return response()->download($path . $name);
    }

    private function saveImage($title, $image)
    {
        $imagemodel = new ImageGallery();
        $imagemodel->title = $title;
        $imagemodel->path = $image;
        $imagemodel->save();
    }

    private function updateDownloadCount($id)
    {
        $imageModel = ImageGallery::find($id);
        $imageModel->download += 1;
        $imageModel->save();
    }
}
