<?php

namespace App\Listeners;

use App\Service\YandexTurbo\Entry;
use App\Service\YandexTurbo\YandexTurboGenerator;
use DateTimeImmutable;
use Illuminate\Support\Collection;
use TightenCo\Jigsaw\Jigsaw;

class GenerateYandexTurbo
{
    public function handle(Jigsaw $jigsaw): void
    {
        /** @var Collection $collection */
        $postsCollection = $jigsaw->getCollection('posts');
        $authorsCollection = $jigsaw->getCollection('authors');

        $turbo = new YandexTurboGenerator();
        $turbo->title = $jigsaw->getConfig('site');
        $turbo->link = $jigsaw->getConfig('baseUrl') . '/feed/turbo.xml';

        foreach ($postsCollection as $post) {
            $authors = [];
            if (is_array($post->author)) {
                foreach ($post->author as $author) {
                    $authors[] = $authorsCollection[$author]['name'];
                }
            }

            $entry = new Entry();
            $entry->title = $post->title;
            $entry->img = $jigsaw->getConfig('baseUrl') . '/assets/images/covers/' . $post->getFilename() . '.png';
            $entry->link = $post->getUrl();
            $entry->authors = $authors;
            $entry->description = $post->getContent();
            $entry->published_at = new DateTimeImmutable(date('Y-m-d H:i:s', $post->date));

            $turbo->addEntry($entry);
        }

        $turbo->saveFeed($jigsaw->getDestinationPath() . '/feed/turbo.xml');
    }
}