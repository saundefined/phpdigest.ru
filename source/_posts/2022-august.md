---
title: Август 2022
author:
  - sergey
  - roman
date: 2022-08-31
external:
  - telegram: https://t.me/phpdigest
  - phpannotated: https://blog.jetbrains.com/phpstorm/2022/08/php-annotated-august-2022/
  - cutcode: https://youtu.be/XZOBB5Dysc4
---

Подборка свежих новостей, инструментов, видео и материалов из мира PHP.

Приятного чтения!

## Новости

### [Вышел PHP 8.2 Beta 3](https://www.php.net/archive/2022.php#2022-08-18-1)

Последняя бета-версия вышла по [расписанию](https://wiki.php.net/todo/php82). Следующий релиз – PHP 8.2.0 RC 1, выход
которого ожидается 1 сентября.

Подробный список того, что появится в PHP 8.2, можно найти на сайте [PHP.Watch](https://php.watch/versions/8.2)
или [stitcher.io](https://stitcher.io/blog/new-in-php-82).

### Вышли [PHP 8.0.22](https://www.php.net/archive/2022.php#2022-08-04-1) и [PHP 8.1.9](https://www.php.net/archive/2022.php#2022-08-04-3)

🪲 Это релизы с исправлениями ошибок в поддерживаемых на данный момент ветках.

### [PHP Foundation Update, July 2022](https://thephp.foundation/blog/2022/08/04/php-foundation-update-july-2022/)

PHP Foundation опубликовал ежемесячный отчёт для спонсоров.

### [Вышел Composer 2.4](https://blog.packagist.com/composer-2-4/)

В нём добавлены аудит зависимостей для обеспечения безопасности, завершение работы bash и множество мелких дополнений.
Подробнее о двух новых командах: [audit](https://php.watch/articles/composer-audit)
и [bump](https://php.watch/articles/composer-bump).

### Вышел [deployphp/deployer](https://github.com/deployphp/deployer/releases/tag/v7.0.0) 7.0.0

Deployer – это инструмент развёртывания, написанный на PHP, с поддержкой популярных фреймворков из коробки.

Одним из самых больших изменений в 7 версии стал новый рецепт `provision`. Рецепт `provision` может автоматически
установить и настроить любой VPS для запуска вашего PHP-приложения. Он установит веб-сервер, SSL, PHP, Redis, node и
другие компоненты.

### Вышел [Codeception/Codeception](https://codeception.com/07-28-2022/codeception-5.html) 5.0.0

Атрибуты, поддержка PHP 8, шардинг и многое другое!

### Вышел [swoole/swoole-src](https://github.com/swoole/swoole-src) 5.0.0

В новой версии модулей параллелизма улучшена система типов, добавлены типы для параметров и возвращаемых значений всех
функций, оптимизирована обработка ошибок, а также внесены другие улучшения и дополнения.

### [Вышел PhpStorm 2022.2](https://www.jetbrains.com/ru-ru/phpstorm/whatsnew/2022-2/)

В этом большом обновлении добавлена поддержка Mockery и Rector, расширена поддержка дженериков и перечислений, улучшен
отладчик и HTTP-клиент и многое другое.

Посмотрите видеообзор 🎬 [Что нового в PhpStorm 2022.2](https://www.youtube.com/watch?v=d0lwc6yjFlc).

Также опубликован
публичный [план развития PhpStorm 2022.3](https://blog.jetbrains.com/phpstorm/2022/08/what-s-next-phpstorm-2022-3-roadmap/).

## PHP Core

Большинство новостей ядра PHP подробно освещаются в
серии [PHP Core Roundup](https://thephp.foundation/blog/tag/roundup/) от PHP Foundation, мы лишь быстро по ним
пробежимся:

### [RFC: Asymmetric Visibility](https://wiki.php.net/rfc/asymmetric-visibility)

Ранее Никита Попов предлагал реализовать аксессоры свойств подобно C#. Этот RFC так и не прошел стадию обсуждения.
Вместо этого были приняты readonly-свойства.

В этот раз Ilija Tovilo и Larry Garfield предлагают добавить Swift-подобный синтаксис, чтобы свойства могли иметь
раздельную («асимметричную») видимость для операций чтения и записи.

```php
class Foo{
    public private(set) string $bar,
}
```

Несколько [заметок](https://externals.io/message/118353) от Larry:

- Это позволит решить проблему клонируемости readonly-свойств.
- Это исправит наследование с readonly. В нынешнем виде readonly можно установить только из области видимости `private`,
  но не из области видимости `protected`.
- Это было бы полезно для свойства, которое перестраивается из других свойств.
  Например, `public private(set) $fullName`, которое обновляется внутри всякий раз, когда
  вызываются `$o->setFirstName()` или `$o->setLastName()`. В будущем это может быть применено к хукам-аксессорам.

## Инструменты

- [serversideup/docker-php](https://github.com/serversideup/docker-php) – Готовые к работе образы Docker для PHP.
  Оптимизированы для Laravel, WordPress и других фреймворков.

- [Crell/Serde](https://github.com/Crell/Serde) – Надежная библиотека Serde (сериализация/десериализация) для PHP 8.

- [statix-php/server](https://github.com/statix-php/server) – Объектно-ориентированная обёртка вокруг встроенного в PHP
  сервера.

- [aimeos/map](https://github.com/aimeos/map) – Массивы и коллекции в PHP. Ещё один пакет коллекций, похожий на Laravel,
  но с нулевыми зависимостями.

- [hotmeteor/spectator](https://github.com/hotmeteor/spectator) – Тестирование OpenAPI для PHP.

- [DaveLiddament/sarb](https://github.com/DaveLiddament/sarb) – Инструмент предоставляет базовую функциональность для
  статических анализаторов PHP.

- [leafsphp/leaf](https://github.com/leafsphp/leaf) – Простой, но мощный микрофреймворк для быстрого создания
  веб-приложений и API.

- [pheature-flags/pheature-flags](https://github.com/pheature-flags/pheature-flags) – Система управления выпуском,
  позволяющая активировать и деактивировать определенные функции в контролируемых условиях.

- [gakowalski/alternative-interpreters](https://github.com/gakowalski/alternative-interpreters) – Список альтернативных
  интерпретаторов, компиляторов и транспиляторов PHP.