<?php

namespace App\Http\Actions;

use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\WebpEncoder;

/**
 * Class AuthorController
 * @package App\Http\Controllers
 */
class ImageHelperEditor
{
    public static $paths = [
        'books' => [
            'thumbnail' => 'img/books/thumbnails/',
            'cover' => 'img/books/covers/',
        ],
        'collaborators' => [
            'thumbnail' => 'img/collab/thumbnails/',
            'cover' => 'img/collab/covers/',
        ],
        'posts' => [
            'thumbnail' => 'img/posts/thumbnails/',
            'cover' => 'img/posts/covers/',
        ],
    ];

    public static $sizes = [
        'books' => ['720', '1080'],
        'collaborators' => ['560', '400'],
        'posts' => ['720', '1080'],
    ];

    public static $reduction_rate = .6;




    private static function configImage($readPath, $savePath, $size)
    {
        // dump($readPath);
        // dump($savePath);
        // dump($size);

        $width = $size[0];
        $height = $size[1];
        $manager = new ImageManager(new Driver());

        // dd($manager->read($readPath));

        $image = $manager->read(public_path($readPath));
        $image_width = $image->width();
        $image_height = $image->height();
        if ($image_width > $width || $image_height > $height) {
            $image->cover($width, $height, "center");
        }
        // Encode the image to webp format with 80% quality
        // dd($image->encode(new WebpEncoder(), 80));

        // Save the processed image
        $image->save(public_path($savePath));
    }




    public static function editImage($fileName, $typeImage)
    {
        switch ($typeImage) {
            case "collaborator":
                $rutaImagen = self::$paths['collaborators']['cover'];
                $rutaThumbnail = self::$paths['collaborators']['thumbnail'];
                $tamaño_original = self::$sizes['collaborators'];
                $tamaño_thumbnail = [
                    self::$sizes['collaborators'][0]*self::$reduction_rate,
                    self::$sizes['collaborators'][1]*self::$reduction_rate
                ];
            break;
            case "book":
                $rutaImagen = self::$paths['books']['cover'];
                $rutaThumbnail = self::$paths['books']['thumbnail'];
                $tamaño_original = self::$sizes['books'];
                $tamaño_thumbnail = [
                    self::$sizes['books'][0]*ImageHelperEditor::$reduction_rate,
                    self::$sizes['books'][1]*self::$reduction_rate
                ];
            break;
            case "post":
                $rutaImagen = self::$paths['posts']['cover'];
                $rutaThumbnail = self::$paths['posts']['thumbnail'];
                $tamaño_original = self::$sizes['posts'];
                $tamaño_thumbnail = [
                    self::$sizes['posts'][0]*self::$reduction_rate,
                    self::$sizes['posts'][1]*self::$reduction_rate
                ];
            break;
            default:
            break;
        }

        self::configImage('/img/temp/'.$fileName, $rutaImagen.$fileName,$tamaño_original);
        self::configImage('/img/temp/'.$fileName, $rutaThumbnail.$fileName,$tamaño_thumbnail);

        File::deleteDirectory(public_path('/img/temp/'));
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
