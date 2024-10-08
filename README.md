# Сайт phpdigest.ru

Это исходный код сайта [phpdigest.ru](https://phpdigest.ru).
Он создан с помощью PHP-генератора статических сайтов [Jigsaw](https://jigsaw.tighten.com/), а для дизайна и верстки
используется [Tailwind CSS](https://tailwindcss.com).

## Публикация дайджеста

Чтобы дайджест, создайте pull request, добавив новый файл в папку `source/_posts/` в
формате `{4-значный год}-{месяц на английском}.md`.

## Разработка/поддержка сайта

### Требования

Для разработки сайта вам понадобятся:

- PHP 8.3 или выше
- Composer
- Node 20 с NPM

### Установка зависимостей

Установите зависимости PHP с помощью Composer:

```bash
$ composer install
```

Установите зависимости CSS с помощью NPM:

```bash
$ npm install
```

### Сборка CSS

CSS сайта намеренно опущен в дереве исходников, так как он создается с помощью Tailwind из классов HTML.
Поэтому перед началом запустите:

```bash
$ npm run watch
```

### Тестирование сайта

### Изменение содержимого

Запустить сервер разработки Jigsaw можно с помощью следующей команды в терминале:

```bash
$ ./vendor/bin/jigsaw serve
```

Это приведёт к запуску сервера по адресу https://localhost:8000.

По мере внесения изменений в содержимое и их сохранения, сервер будет автоматически пересоздавать страницы,
позволяя вам просматривать их в браузере. После этого нажмите `Ctrl-C`.

## Развертывание

[Рабочий процесс](.github/workflows/deploy.yml) автоматически разворачивает сайт на GitHub Pages.