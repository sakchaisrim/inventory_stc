<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Model\Product;
use Image;
use QrCode;

class QrcodeController extends Controller
{
    public function index()
    {

        if (!extension_loaded('imagick')){
            echo 'imagick not installed';
        }
        phpinfo();
        // $image = new Imagick();
        // $image->newImage(1, 1, new ImagickPixel('#ffffff'));
        // $image->setImageFormat('png');
        // $pngData = $image->getImagesBlob();
        // echo strpos($pngData, "\x89PNG\r\n\x1a\n") === 0 ? 'Ok' : 'Failed'; 
        // return view('qrcode');
    }
}
