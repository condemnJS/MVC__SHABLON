<?php

namespace Core\Facades;

use Exception;

class Storage {
    static public $pathToUpload = APP_DIR . "/storage"; // Куда будет загружаться файл по дефолту

    static public function move(string $where, $what) {
        $fileName = $what['name']; // Имя файла
        $fileTmpPath = $what['tmp_name']; // Временное хранилище

        $pathToUpload = 'http:://' . $_SERVER['HTTP_HOST'] . '/storage';

        $fileNameCmps = explode('.', $fileName);
        $fileExtension = strtolower(end($fileNameCmps)); // Расширение файла

        $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

        $toPath = self::$pathToUpload . '/' . $where . '/' . $newFileName;
        if(!file_exists(self::$pathToUpload . '/' . $where)) {
            mkdir(self::$pathToUpload . '/' . $where);
        }
        if(move_uploaded_file($fileTmpPath, $toPath)) {
            return str_replace("\\", '/',  $where . '/' . $newFileName);
        } else {
            throw new Exception('Не удалось загрузить файл');
        }
    }
}