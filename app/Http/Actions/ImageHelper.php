<?php

namespace App\Http\Actions;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\WebpEncoder;

/**
 * Class AuthorController
 * @package App\Http\Controllers
 */
class ImageHelper
{
    private $paths = [
        'books' => [
            'thumbnail' => 'img/books/thumbnails/',
            'portada' => 'img/books/portadas/',
        ],
        'collaborators' => [
            'thumbnail' => '/collaborators/thumbnails/',
            'portada' => '/collaborators/portada/',
        ],
    ];

    private $sizes = [
        'books' => [
            'reduction_rate' => .6,
            'original' => ['', '']
        ],
        'collaborators' => [
            'reduction_rate' => .6,
            'original' => ['', '']
        ],
    ];


    public function editImage($fileName, $typeImage)
    {
        $reductionRate = 0.6;


        switch ($typeImage) {
            case "collaborator":

                ImageHelper::configImage($this->paths['books']['portada'] . $fileName,0,0); //todo
                // ImageHelper::configImage($this->paths['books']['thumbnail'].$fileName);
                $rutaImagen = public_path('img/collab/covers/');
                $rutaThumbnail = public_path('img/collab/thumbnails/');

                //intval($new_width * (1 / 1.5));

                break;
            case "book":
                break;
            default:
                break;
        }
    }
    private static function configImage($path, $width, $height)
    {
        $manager = new ImageManager(new Driver());
        $image = $manager->read($path);
        $image_width = $image->width();
        $image_height = $image->height();

        $new_width = 668;
        $new_height = 446;
        if ($image_width > $new_width || $image_height > $new_height) {
            $image->cover($new_width, $new_height, "center");
        }
        // Encode the image to webp format with 80% quality
        $image->encode(new WebpEncoder(), 80);

        // Save the processed image
        $image->save($path);
    }
}
