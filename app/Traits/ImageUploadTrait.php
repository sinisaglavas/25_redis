<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

trait ImageUploadTrait
{
    public function uploadImage(UploadedFile $file, $path)
    {
        $name = uniqid().'.webp'; // jedinstveno ime slike

        $gd = new Driver();
        $manager = new ImageManager($gd);

        $image = $manager->read($file)->toWebp(90);

        Storage::disk('public')->put("$path/$name", (string) $image); // string - jer mu dajemo originalnu verziju slike

        return $name;
    }
}
