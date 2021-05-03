<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Image;

// $validatedData = $request->validate([
//     'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
//    ]);
class ImageUploadController extends Controller
{
     public function index()
    {
        return view('image-upload');
    }
    public function upload(Request $request)
    {
        
        $validatedData = $request->validate([
         'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
        $name = $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->store('public/uploads');
        $save = new Image;
        $save->name = $name;
        $save->path = $path;
        $save->save();
        return redirect('image')->with('status', 'Image Has been uploaded successfully with validation in laravel');
    }
}

// create table images (id INT NOT NULL AUTO_INCREMENT, name text not null, path text not null, primary key(id))
// alter table images add updated_at datetime after path
// alter table images add created_at datetime after path