<?php

namespace App\Listeners;

use App\Service\PostImage\PostImageGenerator;
use Illuminate\Support\Collection;
use TightenCo\Jigsaw\Jigsaw;

class GeneratePostImage
{
    public function handle(Jigsaw $jigsaw): void
    {
        /** @var Collection $collection */
        $postsCollection = $jigsaw->getCollection('posts');

        if (!is_dir($jigsaw->getDestinationPath() . '/assets/images/covers/')) {
            mkdir($jigsaw->getDestinationPath() . '/assets/images/covers/');
        }

        foreach ($postsCollection as $item) {
            (new PostImageGenerator())
                ->setTitle('PHP-дайджест')
                ->setDescription($item->title)
                ->save($jigsaw->getDestinationPath() . '/assets/images/covers/' . $item->getFilename() . '.png');
        }
    }
}