<?php

namespace App\Service\Sitemap;

class Entry
{
    public string $title;

    public string $link;

    /** @var Author[] */
    public array $authors = [];

    public string $description;

    public \DateTimeImmutable $published_at;
}
