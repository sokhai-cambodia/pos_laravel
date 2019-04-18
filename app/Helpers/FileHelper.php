<?php
namespace App\Helpers;
use File;

Class FileHelper
{

    public static function getDefaultPathName() {
        return  env('UPLOAD_PATH', 'assets/uploads');
    }

    public static function getDefaultImage() {
        return  env('DEFAULT_IMAGE_PATH', 'assets/uploads/default/default.jpg');
    }

    public static function upload($file, $pathName = '') {
        $pathName = $pathName == '' ? FileHelper::getDefaultPathName() : $pathName;
        $fileNewName = time().$file->getClientOriginalName();
        $file->move($pathName, $fileNewName);
        return $fileNewName;
    }

    public static function updateImage($file, $oldFile = "",  $pathName = '') {
        $pathName = $pathName == '' ? FileHelper::getDefaultPathName() : $pathName;
        $oldImagePath = $pathName.'/'.$oldFile;
        FileHelper::deleteImage($oldFile, $pathName);

        return FileHelper::upload($file, $pathName);
    }

    public static function deleteImage($file, $pathName = '') {
        $pathName = $pathName == '' ? FileHelper::getDefaultPathName() : $pathName;
        $imagePath = $pathName.'/'.$file;
        if(File::exists($imagePath)) {
            File::delete($imagePath);
        }
    }

    public static function hasImage($image, $pathName = '') {
        if($image == '' || $image == null) return FileHelper::getDefaultImage();
        $pathName = $pathName == '' ? FileHelper::getDefaultPathName() : $pathName;
        $imagePath = $pathName.'/'.$image;

        return File::exists($imagePath) ? $imagePath : FileHelper::getDefaultImage();
    }

}

?>
