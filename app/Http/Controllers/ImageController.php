<?php

namespace App\Http\Controllers;

 
use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class ImageController extends Controller
{
    public function imageStore(Request $request)
    {
        // $this->validate($request, [
        //     'image' => 'required|image|mimes:jpg,png,jpeg,gif,pdf,svg|max:2048',
        // ]);
        $image_path = $request->file('image')->store('image', 'public');

        $name=$request->input('name');
        $data = Image::create([
            'image' => $image_path,
            'name' =>$name
        ]);

        return response($data, Response::HTTP_CREATED);
    }

    public function index()
    {
        return Image::all();
    }
    public function destroy($id)
    {
        $image = Image::findOrFail($id);
        $image->delete();
        return response()->json(['message' => 'Image deleted successfully'], 200);
    }
}
