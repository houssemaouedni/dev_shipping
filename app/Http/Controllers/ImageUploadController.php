<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageUploadController extends Controller
{

    public function upload($request)
    {
            if($request == null){
                return null;
            }else{
                $image = $request->store('thumbnails');
                return $image;
            }


    }
}
