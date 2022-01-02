<?php

namespace Helpers;

trait FileUploader
{
    public static function upload($file)
    {
        if (!is_dir("../../Public/storage")) {
            mkdir("../../Public/storage", 0700, true);
        }

        $image_name = $file['name'];
        $image_temp = $file['tmp_name'];
        $exp = explode(".", $image_name);
        $end = end($exp);
        $name = time() . "." . $end;

        $path = "../../Public/storage/" . $name;

            if (move_uploaded_file($image_temp, $path)) {
                return $name;
            }
        return false;
    }
}
