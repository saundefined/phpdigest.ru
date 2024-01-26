<?php

return [
    'theme' => 'dracula',

    'token' => getenv('TORCHLIGHT_API_TOKEN'),

    'blade_components' => false,

    // The Host of the API.
    'host' => 'https://api.torchlight.dev',

    'cache_path' => 'torchlight_cache',

    'request_timeout' => 15,

    'options' => [
        'lineNumbers' => true,
        'diffIndicators' => true,
        'diffIndicatorsInPlaceOfLineNumbers' => true,
    ]
];