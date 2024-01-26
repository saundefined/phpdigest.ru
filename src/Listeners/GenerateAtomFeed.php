<?php

namespace App\Listeners;

use App\Service\Sitemap\Author;
use App\Service\Sitemap\Entry;
use App\Service\Sitemap\SitemapGenerator;
use DateTimeImmutable;
use Illuminate\Support\Collection;
use TightenCo\Jigsaw\Jigsaw;

class GenerateAtomFeed
{
    public function handle(Jigsaw $jigsaw): void
    {
        /** @var Collection $collection */
        $postsCollection = $jigsaw->getCollection('posts');
        $authorsCollection = $jigsaw->getCollection('authors');

        if (!is_dir($jigsaw->getDestinationPath() . '/feed/')) {
            mkdir($jigsaw->getDestinationPath() . '/feed/');
        }

        $entries = [];
        foreach ($postsCollection as $post) {
            if (is_array($post->author)) {
                foreach ($post->author as $author) {
                    $entries[$author][] = $post;
                }
            }

            $entries['atom'][] = $post;
        }

        foreach ($entries as $authorSlug => $posts) {
            $atom = new SitemapGenerator();
            $atom->title = $jigsaw->getConfig('site');
            $atom->description = $jigsaw->getConfig('description');

            foreach ($posts as $post) {
                $authors = [];
                if (is_array($post->author)) {
                    foreach ($post->author as $author) {
                        $authors[] = new Author($authorsCollection[$author]['name'], $authorsCollection[$author]['url']);
                    }
                }

                $entry = new Entry();
                $entry->title = $post->title;
                $entry->link = $post->getUrl();
                $entry->authors = $authors;
                $entry->description = $post->getContent();
                $entry->published_at = new DateTimeImmutable(date('Y-m-d H:i:s', $post->date));

                $atom->addEntry($entry);
            }

            $atom->saveFeed($jigsaw->getDestinationPath() . '/feed/' . $authorSlug . '.xml');
        }
    }
}