---
title: Сентябрь 2022
author:
  - sergey
  - roman
date: 2022-09-30
external:
  - telegram: https://t.me/phpdigest
  - phpannotated: https://blog.jetbrains.com/phpstorm/2022/10/php-annotated-september-2022/
  - cutcode: https://youtu.be/J-pDcX9NDFo
---

Подборка свежих новостей, инструментов, видео и материалов из мира PHP.

Приятного чтения!

## Новости

### [Вышел PHP 8.2 RC 3](https://www.php.net/archive/2022.php#2022-09-29-3)

Очередной релиз-кандидат вышел по [расписанию](https://wiki.php.net/todo/php82). Следующий RC 4 ожидается 13 октября.

Подробный список того, что появится в PHP 8.2, можно найти на сайте [PHP.Watch](https://php.watch/versions/8.2)
или [stitcher.io](https://stitcher.io/blog/new-in-php-82).

### Вышли [PHP 7.4.32](https://www.php.net/archive/2022.php#2022-09-29-1), [PHP 8.0.24](https://www.php.net/archive/2022.php#2022-09-30-1) и [PHP 8.1.11](https://www.php.net/archive/2022.php#2022-09-29-2)

❗Это релизы безопасности текущих поддерживаемых веток. **Всем пользователям рекомендуется обновиться.**

### [Открыта программа раннего доступа PhpStorm 2022.3](https://blog.jetbrains.com/phpstorm/2022/09/phpstorm-2022-3-eap-is-open/)

Вот что вы уже можете попробовать в рамках программы раннего доступа к PhpStorm:

- Бета-доступ к новому пользовательскому интерфейсу
- Полная поддержка PHP 8.2
- Предварительные просмотры быстрых исправлений
- И многое другое

## PHP Core

Большинство новостей ядра PHP подробно освещаются в
серии [PHP Core Roundup](https://thephp.foundation/blog/tag/roundup/) от PHP Foundation, мы лишь быстро по ним
пробежимся:

### 📊 [RFC: json_validate](https://wiki.php.net/rfc/json_validate)

В этом RFC Juan Carlos Morales предлагает добавить новую функцию `json_validate()`, которая проверяет, содержит ли
строка корректный JSON:

```php
var_dump(json_validate('{ "test": { "foo": "bar" } }')); // true
```

### 📣 [RFC: Improve unserialize() error handling](https://wiki.php.net/rfc/improve_unserialize_error_handling)

Tim Düsterhus предлагает добавить новое исключение `UnserializationFailedException`, которое выбрасывается в случае
ошибки десериализации:

```php
try {
    $result = unserialize($serialized);
    var_dump($result);
} catch (\UnserializationFailureException $e) {
    // ошибка десериализации
}
```

### 📣 [RFC: StreamWrapper Support for glob()](https://wiki.php.net/rfc/glob_streamwrapper_support)

Timmy Almroth предлагает реализовать в `StreamWrappers` поддержку функции `glob()`.

```php
glob('vfs://*.ext')
```

### ☝️ [RFC: Deprecations for PHP 8.3](https://wiki.php.net/rfc/deprecations_php_8_3)

RFC, в котором перечислены функции, которые должны быть признаны устаревшими в PHP 8.3 и удалены в PHP 9.

## Инструменты

- [play.phpsandbox.io](https://play.phpsandbox.io/) – Попробуйте пакеты Composer прямо в браузере, ничего не
  устанавливая. Блестяще!

- [matthiasnoback/php-ast-inspector](https://github.com/matthiasnoback/php-ast-inspector/) – Пошаговый отладчик
  командной строки для абстрактного синтаксического
  дерева. [Подробнее об использовании](https://matthiasnoback.nl/2022/09/a-step-debugger-for-the-php-ast/).

- [kladskull/xEroS](https://github.com/kladskull/xEroS) – Блокчейн, похожий на Bitcoin, написанный на 100% PHP. Хорошо
  подходит для образовательных целей.

- [sfx101/deck](https://github.com/sfx101/deck) – Настольный инструмент для создания локальных сред разработки на основе
  Docker одним щелчком мыши.

- [cspray/annotated-container](https://github.com/cspray/annotated-container) – Фреймворк для инъекции зависимостей для
  конфигурирования контейнера PSR-11 с помощью атрибутов!

- [phparkitect/arkitect](https://github.com/phparkitect/arkitect) – Этот инструмент позволяет определить архитектурные
  ограничения для вашей PHP-кодовой базы и запустить их в CI.

- [WordPress/wordpress-wasm](https://github.com/WordPress/wordpress-wasm) – Запустите WordPress в браузере благодаря
  магии WebAssembly.

### Symfony

- Вышел [symfony/webpack-encore](https://github.com/symfony/webpack-encore) 4.0.0 – Некоторые зависимости (например,
  webpack) были перенесены из Encore в проект.

- [StenopePHP/Stenope](https://github.com/StenopePHP/Stenope) – Инструмент создания статических веб-сайтов для Symfony.
  Вы можете создать полноценное приложение Symfony, а затем развернуть его в виде статической страницы в любом удобном
  для вас месте.

## Laravel

- [ksassnowski/venture](https://github.com/ksassnowski/venture) 4.0.0 – Пакет для создания и управления сложными
  асинхронными рабочими процессами в приложениях
  Laravel.

- [spatie/laravel-model-info](https://github.com/spatie/laravel-model-info) – Пакет для получения информации обо всех
  моделях.

- [YorCreative/Laravel-Scrubber](https://github.com/YorCreative/Laravel-Scrubber) – Пакет для очистки конфиденциальной
  информации, нарушающей политики операционной
  безопасности, от случайной или неслучайной утечки
  разработчиками. [Подробнее об использовании](https://laravel-news.com/laravel-scrubber).

- 👨‍🏫 [Laracon Online](https://youtu.be/f4QShF42c6E) – Видеозаписи всех докладов с онлайн конференции по Laravel.
  Тейлор представил [Laravel Bootcamp](https://laravel-news.com/laravel-bootcamp) – новый обучающий сайт по Laravel.

## Другие фреймворки

- Вышел [spiral/framework](https://github.com/spiral/framework/releases/tag/3.0.0) 3.0.0 – Большое обновление фреймворка
  от создателей RoadRunner.

- Вышел [Phalcon PHP Framework](https://github.com/phalcon/cphalcon) 5.0 – Подробный список нововведений приведён
  в [документации](https://docs.phalcon.io/5.0/en/upgrade).

- Вышел [api-platform/api-platform](https://github.com/api-platform/api-platform/releases/tag/v3.0.0) 3.0 – Фреймворк
  построен поверх Symfony и позволяет создавать REST и GraphQL API и многое другое.

- [Appwrite](https://appwrite.io/1.0) 1.0 – Крупный стабильный выпуск решения с открытым исходным кодом
  backend-as-a-service.

- Вышли обновления пакетов [yiisoft/strings](https://github.com/yiisoft/strings)
  2.1.0, [yiisoft/middleware-dispatcher](https://github.com/yiisoft/middleware-dispatcher)
  3.0.0, [yiisoft/profiler](https://github.com/yiisoft/profiler)
  2.0.0, [yiisoft/translator](https://github.com/yiisoft/translator)
  1.1.1, [yiisoft/cache-file](https://github.com/yiisoft/cache-file) 2.0.1.

  Более подробно новости Yii освещаются в канале «[Хроники Yii3](https://t.me/yii3chronicles)».

## Статьи

- [Как мы решаем проблемы со склонением слов для задач seo-оптимизации с помощью phpMorphy](https://habr.com/ru/company/rshb/blog/688330/)
- [PHP: атрибуты vs аннотации: оптимизируем метадату Doctrine](https://habr.com/ru/post/686796/)
- [Выходя за рамки ООП. Разработка расширений для PHP на PHP](https://habr.com/ru/company/oleg-bunin/blog/577658/)


