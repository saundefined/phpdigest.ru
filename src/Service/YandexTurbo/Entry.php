<?php

namespace App\Service\YandexTurbo;

class Entry
{
    public string $title;

    public string $link;

    public string $description;

    public string $img;

    public array $authors = [];

    public \DateTimeImmutable $published_at;
}
