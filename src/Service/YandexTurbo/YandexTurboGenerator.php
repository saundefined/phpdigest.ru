<?php

namespace App\Service\YandexTurbo;

use DOMDocument;

class YandexTurboGenerator
{
    public string $title;

    public string $link;

    public string $language = 'ru';

    protected array $entries = [];

    public function addEntry(Entry $entry): void
    {
        $this->entries[] = $entry;
    }

    public function saveFeed($path): void
    {
        $dom = new DOMDocument('1.0', 'utf-8');
        $feed = $dom->createElement('rss');
        $feed->setAttribute('xmlns:turbo', 'http://turbo.yandex.ru');
        $feed->setAttribute('version', '2.0');

        $channel = $dom->createElement('channel');

        $channel->appendChild($dom->createElement('title', $this->title));
        $channel->appendChild($dom->createElement('link', $this->link));
        $channel->appendChild($dom->createElement('language', $this->language));

        $feed->append($channel);

        /** @var Entry $entry */
        foreach ($this->entries as $entry) {
            $element = $dom->createElement('item');
            $element->setAttribute('turbo', 'true');

            $element->appendChild($dom->createElement('link', $entry->link));
            $element->appendChild($dom->createElement('pubDate', $entry->published_at->format('c')));

            foreach ($entry->authors as $author) {
                $element->append($dom->createElement('author', $author));
            }

            $content = $dom->createElement('turbo:content');

            $header = $dom->createElement('header');
            $header->append($dom->createElement('h1', $entry->title));

            $figure = $dom->createElement('figure');
            $figure->append($dom->createElement('img', $entry->img));

            $header->append($figure);

            $content->append(
                $dom->createElement('turbo:extendedHtml', 'true'),
                $header,
                $dom->createCDATASection($entry->description)
            );

            $channel->append($content);
        }

        $dom->append($feed);

        file_put_contents($path, $dom->saveXML());
    }
}
