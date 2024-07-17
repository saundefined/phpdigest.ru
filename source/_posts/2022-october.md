---
title: Октябрь 2022
author:
  - sergey
  - roman
date: 2022-11-02
year: 2022
external:
  - telegram: https://t.me/phpdigest
  - phpannotated: https://blog.jetbrains.com/phpstorm/2022/11/php-annotated-october-2022/
  - cutcode: https://youtu.be/6PiOAX0ql_0
---

Подборка свежих новостей, инструментов, видео и материалов из мира PHP.

Приятного чтения!

## Новости

### [Вышел PHP 8.2.0 RC 5](https://www.php.net/archive/2023.php#2023-10-26-1)

Очередной релиз-кандидат вышел по [расписанию](https://wiki.php.net/todo/php82). Шестой релиз-кандидат ожидается 10
ноября и он станет последним перед публичным выпуском PHP 8.2.

Ознакомьтесь с тем, что появится в PHP 8.2 на сайте [PHP.Watch](https://php.watch/versions/8.2)
или [stitcher.io](https://stitcher.io/blog/new-in-php-82).

### Вышли [PHP 8.0.25](https://www.php.net/archive/2022.php#2022-10-28-1) и [PHP 8.1.12](https://www.php.net/archive/2022.php#2022-10-28-2)

❗ Это выпуски безопасности для поддерживаемых в настоящее время веток. Всем пользователям рекомендуется обновиться.

Обновления устраняют уязвимости в модуле Phar и целостности cookie. Более подробную информацию вы можете почитать
на [PHP.Watch](https://php.watch/news/2022/09/php-releases-8.1.11-8.0.24-7.4.32).

## PHP Core

Большинство новостей ядра PHP подробно освещаются в
серии [PHP Core Roundup](https://thephp.foundation/blog/tag/roundup/) от PHP Foundation, мы лишь быстро по ним
пробежимся:

### ✅ [RFC: json_validate](https://wiki.php.net/rfc/json_validate)

Juan Carlos Morales предложил добавить новую функцию `json_validate()`, которая проверяет, содержит ли строка корректный
JSON. Это сэкономит память, когда не нужно полностью разбирать строку, а достаточно проверить, является ли она JSON.

```php
var_dump(json_validate('{ "test": { "foo": "bar" } }')); // bool(true)
var_dump(json_validate('{ "": "": "" } }')); // bool(false)
```

### ❌ ✅ [RFC: Improve unserialize() error handling](https://wiki.php.net/rfc/improve_unserialize_error_handling)

Tim Düsterhus предлагал добавить новое исключение `UnserializationFailedException`, которое выбрасывается в случае
возникновения ошибки сериализации.

RFC [бурно обсуждался в Twitter](https://twitter.com/nicolasgrekas/status/1581023556707618818) и в конце концов часть,
касающаяся выбрасывания исключения, не была принята. Вместо этого будет увеличен уровень выдаваемой ошибки с `E_NOTICE`
до `E_WARNING`.

### 📣 [RFC: Randomizer Additions](https://wiki.php.net/rfc/randomizer_additions)

Tim Düsterhus и Joshua Rüsweg предлагают добавить новые методы классу `Randomizer`, которые реализуют часто используемые
операции, но сложно реализуемые в пользовательском коде.

```php
namespace Random; 

final class Randomizer {
    // […]
    public function getBytesFromAlphabet(string $alphabet, int $length): string {}
    public function nextFloat(): float {}
    public function getFloat(float $min, float $max): float {}
}
```

### 📣 [RFC: Destructuring Coalesce](https://wiki.php.net/rfc/destructuring_coalesce)

Bob Weinand предложил добавить оператор для значений по умолчанию в деструктивных присваиваниях.

```php
$input = 'key=value';
[$key, $val ?? 'default value'] = explode('=', $input, 2);
```

## Инструменты

- [dunglas/frankenphp](https://github.com/dunglas/frankenphp) – Современный сервер приложений на PHP, написанный на
  языке Go и встроенный в веб-сервер Caddy.

- [cachewerk/relay](https://github.com/cachewerk/relay) – Клиент Redis, подобный PhpRedis и Predis, но гораздо более
  быстрый, поскольку написан как модуль PHP. Авторы также предоставляют интеграцию с Laravel, WordPress и Magento для
  кеширования.

- [Saeghe](https://saeghe.com/) – современный менеджер пакетов PHP.

  Теперь у PHP есть ещё один менеджер пакетов! Он использует ссылки GitHub в качестве зависимостей. Кроме того, он не
  полагается на PSR-автозагрузку, вместо этого полагаясь на этап сборки.

  Конкуренция всегда полезна!

- [composer-unused/composer-unused](https://github.com/composer-unused/composer-unused) – Пакет, который сканирует код
  для выявления неиспользуемых зависимостей композитора.

- [square/pjson](https://github.com/square/pjson) – Библиотека помогает десериализовать JSON в реальные объекты
  пользовательских классов. Для этого она использует атрибуты PHP 8 для свойств классов.

- [doctrine/collections](https://github.com/doctrine/collections/releases/tag/2.0.0) – Популярная библиотека коллекций,
  которая получила большое обновление, добавив более строгую типизацию и собственные типы параметров и возвращаемых
  значений.

- [heiglandreas/holidayChecker](https://github.com/heiglandreas/holidayChecker) – Пакет позволяет проверить, является ли
  заданная дата праздничной и ориентирован на местные условия.

- [Laragon](https://laragon.org/) – Ещё один инструмент локальной среды разработки – портативная, изолированная, быстрая
  и мощная альтернатива XAMPP и подобным решениям. Узнайте больше в этом посте
  на [PHP.Watch](https://php.watch/articles/laragon-windows-php).

- [gacela-project/gacela](https://github.com/gacela-project/gacela) – Пакет помогает создавать модульные PHP-приложения,
  разделяя ваш проект на различные модули в едином порядке. В значительной степени
  вдохновлен [Spryker](https://github.com/spryker).

### Symfony

- ❗️[Twig security release: Possibility to load a template outside a configured directory when using the filesystem loader](https://symfony.com/blog/twig-security-release-possibility-to-load-a-template-outside-a-configured-directory-when-using-the-filesystem-loader)

- [emr-dev/sf-bug-bundle](https://github.com/emr-dev/sf-bug-bundle) – Пакет для совместного использования страниц
  профилировщика. [Подробнее об использовании](https://sfbug.io/).

## Laravel

- [spatie/laravel-dynamic-servers](https://github.com/spatie/laravel-dynamic-servers) – Пакет для динамического создания
  и удаления серверов. [Подробнее об использовании](https://laravel-news.com/laravel-dynamic-servers).
- [creagia/laravel-sign-pad](https://github.com/creagia/laravel-sign-pad) – Пакет для подписания документов и, по
  желанию, генерации PDF, связанных с моделями
  Eloquent. [Подробнее об использовании](https://laravel-news.com/laravel-pad-signature).
- [hammerstonedev/sidecar](https://github.com/hammerstonedev/sidecar) – Развёртывание и выполнение функций AWS Lambda в
  Laravel.

## Статьи

- [Цветные функции: ищем плохие архитектурные паттерны](https://habr.com/ru/company/vk/blog/691828/)
- [Перестаньте использовать SQLite в Unit-тестах перевод статьи](https://habr.com/ru/post/691838/)
- [Yii3 Overview 1. Вступление](https://habr.com/ru/post/695664/)
- [Декомпозируем регулярные выражения](https://habr.com/ru/post/693622/)

## Видео

- [Пыхэфир #2](https://youtu.be/2UiGZVrNG6c) c Валентином Удальцовым.
- [PHP-линч #1](https://youtu.be/MwMCzqvCGKo) – Первый в мире PHP-линч на канале PHP Point.
- [RND PHP #5](https://youtu.be/MKDpINPU_KI) – Митап сообщества PHP разработчиков города Ростов-на-Дону.

## События

- [PHP Russia](https://phprussia.ru/moscow/2022) – Крупнейшая конференция по PHP в России пройдёт 24-25 ноября в рамках
  HighLoad++ 2022.
- [Podlodka PHP Crew](https://podlodka.io/phpcrew) – Недельная конференция с экспертами из топовых компаний — сессии в
  Zoom, сообщество в Slack и ламповая атмосфера.
