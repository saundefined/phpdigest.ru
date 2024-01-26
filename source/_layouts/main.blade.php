<!DOCTYPE html>
<html lang="{{ $page->language ?? 'en' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="canonical" href="{{ $page->getUrl() }}">
    <meta name="description" content="{{ $page->description }}">
    <title>{{ $page->title ? $page->title. ' | ' .$page->site : $page->site }}</title>
    <link rel="stylesheet" href="{{ mix('css/main.css', 'assets/build') }}">

    <meta property="og:url" content="{{ $page->getUrl() }}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $page->title ? $page->title. ' | ' .$page->site : $page->site }}">
    <meta property="og:description" content="{{ $page->description }}">
    <meta property="og:image" content="{{ $page->baseUrl }}/assets/icons/share.png">

    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="{{ $page->getUrl() }}">
    <meta property="twitter:url" content="{{ $page->getUrl() }}">
    <meta name="twitter:title" content="{{ $page->title ? $page->title. ' | ' .$page->site : $page->site }}">
    <meta name="twitter:description" content="{{ $page->description }}">
    <meta name="twitter:image" content="{{ $page->baseUrl }}/assets/icons/share.png">

    <link rel="apple-touch-icon" sizes="57x57" href="{{ $page->baseUrl }}/assets/icons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ $page->baseUrl }}/assets/icons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ $page->baseUrl }}/assets/icons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ $page->baseUrl }}/assets/icons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ $page->baseUrl }}/assets/icons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ $page->baseUrl }}/assets/icons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ $page->baseUrl }}/assets/icons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ $page->baseUrl }}/assets/icons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ $page->baseUrl }}/assets/icons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ $page->baseUrl }}/assets/icons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ $page->baseUrl }}/assets/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ $page->baseUrl }}/assets/icons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ $page->baseUrl }}/assets/icons/favicon-16x16.png">

    <link rel="manifest" href="{{ $page->baseUrl }}/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ $page->baseUrl }}/assets/icons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    
    <link rel="alternate" type="application/atom+xml" href="{{ $page->baseUrl }}/feed/atom.xml"/>
</head>
<body class="text-gray-900 font-sans antialiased">
@include('_partials.layout.header')

@yield('body')

@include('_partials.layout.footer')

<script defer src="{{ mix('js/main.js', 'assets/build') }}"></script>
</body>
</html>
