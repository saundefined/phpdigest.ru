<?php

namespace App\Service\PostImage;

use GdImage;

class PostImageGenerator
{
    public const IMAGE_WIDTH = 1600;

    public const IMAGE_HEIGHT = 900;

    public const IMAGE_MARGINS = 72;

    public const TITLE_FONT_SIZE = 72;

    public const DESCRIPTION_FONT_SIZE = 42;

    protected string $title;

    protected ?string $description = null;

    public function setTitle($title): PostImageGenerator
    {
        $this->title = $title;

        return $this;
    }

    public function setDescription($description): PostImageGenerator
    {
        $this->description = $description;

        return $this;
    }

    public function output(): void
    {
        $image = $this->prepare();

        header('Content-type: image/png');
        imagepng($image);
        imagedestroy($image);
    }

    public function save($path): void
    {
        $image = $this->prepare();

        imagepng($image, $path);
        imagedestroy($image);
    }

    public function prepare(): GdImage
    {
        $image = imagecreate(self::IMAGE_WIDTH, self::IMAGE_HEIGHT);

        imagecolorallocate($image, 28, 96, 173);
        $whiteColor = imagecolorallocate($image, 255, 255, 255);

        $title = wordwrap($this->title, 27);
        $titleBounds = imagettfbbox(
            self::TITLE_FONT_SIZE,
            0,
            __DIR__ . '/../../../source/_assets/fonts/Rubik-Regular.ttf',
            $title
        );
        $titleHeight = $titleBounds[1] - $titleBounds[7];

        imagettftext(
            $image,
            self::TITLE_FONT_SIZE,
            0,
            self::IMAGE_MARGINS,
            self::IMAGE_MARGINS * 3,
            $whiteColor,
            __DIR__ . '/../../../source/_assets/fonts/Rubik-Regular.ttf',
            $title
        );

        if ($this->description) {
            $author = wordwrap($this->description, 40);

            imagettftext(
                $image,
                self::DESCRIPTION_FONT_SIZE,
                0,
                self::IMAGE_MARGINS,
                self::IMAGE_MARGINS * 3 + $titleHeight + self::DESCRIPTION_FONT_SIZE,
                $whiteColor,
                __DIR__ . '/../../../source/_assets/fonts/Rubik-Regular.ttf',
                $author
            );
        }

        $logo = imagecreatefrompng(__DIR__ . '/../../../source/_assets/img/logo.png');

        $srcHeight = 100;
        imagecopy($image, $logo, self::IMAGE_MARGINS, self::IMAGE_HEIGHT - self::IMAGE_MARGINS - $srcHeight, 0, 0, 100, $srcHeight);

        return $image;
    }
}