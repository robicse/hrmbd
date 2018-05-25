<?php
namespace App\Controller;

use App\Controller\AppController;

class ImagesCustomizerController extends AppController{

	private $UploadDir 		= WWW_ROOT . 'uploads' . DS;

	private $NotFoundImage 	= WWW_ROOT . 'uploads' . DS . 'not_found.png';

    public function myImage($folder='users',$image='user.png',$size=false){
    	$this->autoRender = false;

    	$extension = explode('.', $image);
    	$extension = end($extension);

		$fullPath = $this->UploadDir.$folder.DS.$image;

		if (!file_exists($fullPath)) {
			$fullPath = $this->NotFoundImage;
		}

		/*Getting the image dimensions*/
		list($width, $height) = getimagesize($fullPath);

		/*Saving the image into memory (For manipulation with GD Library)*/
		switch ($extension) {
			case 'png':
					header('Content-type: image/png');
					$myImage = imagecreatefrompng($fullPath);
				break;

			case 'jpg':
					header('Content-type: image/jpg');
					$myImage = imagecreatefromjpeg($fullPath);
				break;

			case 'jpeg':
					header('Content-type: image/jpeg');
					$myImage = imagecreatefromjpeg($fullPath);
				break;

			default:
				# code...
				break;
		}
		/*Print Original Image If No Size Is Selected*/
		if (!$size) {
			echo file_get_contents($fullPath);
			die();
		}
		/*Calculating the part of the image to use for thumbnail*/
		if ($width > $height) {
		  $y = 0;
		  $x = ($width - $height) / 2;
		  $smallestSide = $height;
		} else {
		  $x = 0;
		  $y = ($height - $width) / 2;
		  $smallestSide = $width;
		}

    	/*Copying the part into thumbnail*/
		$thumbSize = $size;
		$thumb = imagecreatetruecolor($thumbSize, $thumbSize);
		imagecopyresampled($thumb, $myImage, 0, 0, $x, $y, $thumbSize, $thumbSize, $smallestSide, $smallestSide);

		/*Final output with proper ContentType*/
		switch ($extension) {
			case 'png':
					imagepng($thumb);
				break;

			case 'jpg':
					imagejpeg($thumb);
				break;

			case 'jpeg':
					imagejpeg($thumb);
				break;

			default:
				# code...
				break;
		}
		die();
    }

}
