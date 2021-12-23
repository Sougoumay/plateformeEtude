<?php

namespace App\Helpers;

class UploadFiles
{
    public static $uploadPaths = array(
        'profile_photos'=>'/uploads/profile/',
    );

    public static function getUploadPaths($paths)
    {
        return public_path().self::$uploadPaths[$paths];
    }
}
