<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Str;
use Image;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function fileUpload($file, $path, $width = null, $height = null) {
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        $file_url = $path . Str::random(50) . preg_replace('~[\\\\/:*? "<>|@!#%&]~', '-', $file->getClientOriginalName());
        $upload = Image::make($file);
        if ($width && $height) {
            $upload->resize($width, $height);
        }
        $upload->save($file_url);
        return $file_url;
    }
}
