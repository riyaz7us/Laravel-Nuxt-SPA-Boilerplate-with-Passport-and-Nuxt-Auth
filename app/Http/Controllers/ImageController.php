<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Validator;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function addImage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'mimes:jpeg,bmp,png',
        ]);
        $path = $request->file('image')->store($request->path, ['disk' => 'public']);
        //$path = putFileAs($request->file('file'), new File('storelogos'));
        return response()->json(['image' => $path], 201);
    }

    public function deleteImage(Request $request){
        $image_path = public_path('storage/'.$request->filename);  // Value is not URL but directory file path
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        return response()->json($image_path,200);
    }

    public function replaceImage(Request $request){
        $validator = Validator::make($request->all(), [
            'image' => 'mimes:jpeg,bmp,png',
        ]);
        $image_path = public_path('storage/' . $request->path .  $request->delete);  // Value is not URL but directory file path
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        $path = $request->file('image')->store($request->path, ['disk' => 'public']);
        //$path = putFileAs($request->file('file'), new File('storelogos'));
        return response()->json(['image' => $path], 201);
    }
}
