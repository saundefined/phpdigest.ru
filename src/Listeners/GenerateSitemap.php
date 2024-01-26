<?php

namespace App\Listeners;

use samdark\sitemap\Sitemap;
use TightenCo\Jigsaw\Jigsaw;

class GenerateSitemap
{
    public function handle(Jigsaw $jigsaw): void
    {
        $baseUrl = $jigsaw->getConfig('baseUrl') ?: 'https://localhost';

        if (!is_dir($jigsaw->getDestinationPath() . '/feed/')) {
            mkdir($jigsaw->getDestinationPath() . '/feed/');
        }

        $sitemap = new Sitemap($jigsaw->getDestinationPath() . '/feed/sitemap.xml');
        collect($jigsaw->getOutputPaths())->each(function ($path) use ($baseUrl, $sitemap) {
            if (!$this->isAsset($path)) {
                $sitemap->addItem($baseUrl . $path, time(), Sitemap::DAILY);
            }
        });

        $sitemap->write();
    }

    public function isAsset($path): bool
    {
        return str_starts_with($path, '/assets');
    }
}