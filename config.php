<?php

use Carbon\Carbon;

return [
    'production' => false,
    'baseUrl' => '',
    'site' => 'PHP-дайджест',
    'description' => 'Подборка свежих новостей, инструментов, видео и материалов из мира PHP',
    'collections' => [
        'posts' => [
            'path' => 'post/{filename}',
            'extends' => '_layouts.post',
            'section' => 'content',
            'sort' => ['-date'],
            'excerpt' => function ($page, $characters = 161) {
                return substr(strip_tags($page->getContent()), 0, $characters);
            },
        ],
        'years' => [
            'items' => [
                ['title' => '2022', 'description' => 'Подборка свежих новостей, инструментов, видео и материалов из мира PHP за 2022 год'],
                ['title' => '2023', 'description' => 'Подборка свежих новостей, инструментов, видео и материалов из мира PHP за 2023 год'],
                ['title' => '2024', 'description' => 'Подборка свежих новостей, инструментов, видео и материалов из мира PHP за 2024 год'],
            ],
            'path' => 'posts/year/{title}',
            'extends' => '_layouts.year',
            'section' => 'content',
            'sort' => '-title',
            'posts' => function ($page, $allPosts) {
                return $allPosts->filter(function ($post) use ($page) {
                    return str_contains($post->getFilename(), $page->title);
                });
            },
        ],
        'authors' => [
            'items' => [
                'sergey' => [
                    'name' => 'Сергей Пантелеев',
                    'image' => 'https://avatars.githubusercontent.com/u/4685504',
                    'job' => 'Релиз-менеджер PHP 8.2',
                    'url' => 'https://sergeypanteleev.com',
                ],
                'roman' => [
                    'name' => 'Роман Пронский',
                    'image' => 'https://avatars.githubusercontent.com/u/1196825',
                    'job' => 'Администратор PHP Foundation',
                    'url' => 'https://pronskiy.com',
                ]
            ]
        ]
    ],

    'getDate' => function ($post) {
        return Carbon::createFromTimestamp($post->date)->locale('ru_RU')->translatedFormat('d F Y');
    },
];
