<?php

namespace App\Http\Controllers\Admin;

use App\Models\Image;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class ImageController extends Controller
{
    public function destroy(Image $image)
    {
        Storage::delete($image->path);
        $image->delete();

    }
}
