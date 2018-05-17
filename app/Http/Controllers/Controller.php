<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Intervention\Image\Constraint;
use Image;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    protected function imageFit($image)
    {
        $filename = 'uploads/' . $image->getClientOriginalName();
        Image::make($image->getRealPath())->fit(300, 292)->save($filename);
        return $filename;
    }

}
