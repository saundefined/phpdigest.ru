<?php

use App\Listeners\GenerateAtomFeed;
use App\Listeners\GeneratePostImage;
use App\Listeners\GenerateSitemap;
use App\Listeners\GenerateYandexTurbo;
use Illuminate\Container\Container;
use TightenCo\Jigsaw\Events\EventBus;
use Torchlight\Jigsaw\TorchlightExtension;

/** @var Container $container */
/** @var EventBus $events */

$events->afterBuild(GeneratePostImage::class);
$events->afterBuild(GenerateSitemap::class);
$events->afterBuild(GenerateAtomFeed::class);
$events->afterBuild(GenerateYandexTurbo::class);


TorchlightExtension::make($container, $events)->boot();
