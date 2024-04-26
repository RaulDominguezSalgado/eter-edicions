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
    public static $paths = [
        'books' => [
            'thumbnail' => '/img/books/thumbnails/',
            'portada' => '/img/books/portadas/',
        ],
        'collaborators' => [
            'thumbnail' => '/img/collaborators/thumbnails/',
            'portada' => '/img/collaborators/portada/',
        ],
    ];

    public static $sizes = [
        'books' => ['720', '1080'],
        'collaborators' => ['560', '400'],
    ];

    public static $reduction_rate = .6;




    private static function configImage($path, $size)
    {
        $width = $size[0];
        $height = $size[1];
        $manager = new ImageManager(new Driver());
        $image = $manager->read($path);
        $image_width = $image->width();
        $image_height = $image->height();
        if ($image_width > $width || $image_height > $height) {
            $image->cover($width, $height, "center");
        }
        // Encode the image to webp format with 80% quality
        $image->encode(new WebpEncoder(), 80);

        // Save the processed image
        $image->save($path);
    }




    public static function editImage($fileName, $typeImage)
    {
        switch ($typeImage) {
            case "collaborator":
                $rutaImagen = self::$paths['collaborators']['portada'];
                $rutaThumbnail = self::$paths['collaborators']['thumbnail'];
                $tamaño_original = self::$sizes['collaborators'];
                $tamaño_thumbnail = [
                    self::$sizes['collaborators'][0]*self::$reduction_rate,
                    self::$sizes['collaborators'][1]*self::$reduction_rate
                ];
            break;
            case "book":
                $rutaImagen = self::$paths['books']['portada'];
                $rutaThumbnail = self::$paths['books']['thumbnail'];
                $tamaño_original = self::$sizes['books'];
                $tamaño_thumbnail = [
                    self::$sizes['books'][0]*ImageHelper::$reduction_rate,
                    self::$sizes['books'][1]*self::$reduction_rate
                ];
            break;
            default:
            break;
        }

        self::configImage($rutaImagen.$fileName,$tamaño_original);
        self::configImage($rutaThumbnail.$fileName,$tamaño_thumbnail);
    }

    public static function regenerateImages() {
        foreach (self::$paths as $post_type) {
            foreach ($post_type as $path) {
                $ficheros = scandir($_SERVER['DOCUMENT_ROOT'].$path);
                foreach ($ficheros as $fichero) {
                    if ($fichero != '.' && $fichero != '..' && strpos($fichero, '.') !== 0) {
                        self::editImage($fichero, $path);
                    }
                }
            }
        }
    }
}
