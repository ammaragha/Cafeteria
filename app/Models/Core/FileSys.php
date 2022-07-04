<?php
namespace App\Models\Core;
use ErrorException;
class FileSys
{
    private $imgName;
    private $imgType;
    private $imgTmpName;
    private $dir;


    function __construct(array $file,$dir="images/")
    {
        $this->dir = $dir;
        if ($file) {
            $this->imgName = $file['name'];
            $this->imgType = pathinfo($this->imgName, PATHINFO_EXTENSION);
            $this->imgTmpName = $file['tmp_name'];
        } else {
            throw new ErrorException("No file :/");
        }
       
    }

    public function genName()
    {
        $ext = $this->getType();
        return time() . "." . $ext;
    }

    public function setDir($dir)
    {
        $this->dir = $dir;
    }

    public function getType()
    {
        if (
            $this->imgType != "jpg" && $this->imgType != "png" && $this->imgType != "jpeg"
            && $this->imgType != "gif"
        ) {
             throw new ErrorException('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');
        }
        return $this->imgType;
    }

    public function upload()
    {
        $img = $this->dir . $this->genName();
        $moved = move_uploaded_file($this->imgTmpName, $img);
        if ($moved) {
            return $img;
        } else
            return  throw new ErrorException('Cant upload file mabye problem with folder');
    }


    static function getImage($relative_path, $image_path)
    {
        return $relative_path . "/" . $image_path;
    }
}
