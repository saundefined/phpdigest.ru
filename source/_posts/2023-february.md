---
title: Февраль 2023
author:
  - sergey
  - roman
date: 2023-02-28
external:
  - telegram: https://t.me/phpdigest
  - phpannotated: https://blog.jetbrains.com/phpstorm/2023/02/php-annotated-february-2023/
  - cutcode: https://youtu.be/qGQfzth-9YU
---

Подборка свежих новостей, инструментов, видео и материалов из мира PHP.

Приятного чтения!

## Новости

### Вышли [PHP 8.0.28](https://www.php.net/archive/2023.php#2023-02-14-1), [PHP 8.1.16](https://www.php.net/archive/2023.php#2023-02-14-3) и [PHP 8.2.3](https://www.php.net/archive/2023.php#2023-02-14-2)

❗**Это обновления безопасности с исправлениями** [CVE-2023-0568](https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2023-0568), [CVE-2023-0567](https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2023-0567) и [CVE-2023-0662](https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2023-0662).

Если вы всё ещё используете PHP 7.4, в [репозитории Remi](https://blog.remirepo.net/post/2022/11/29/PHP-7.4-is-retired#comments) есть обновления с исправлениями безопасности. Однако не забывайте, что этот репозиторий - проект, который делается по мере сил и зависит от того, сколько свободного времени Remi может ему уделять. Это означает, что нет никаких гарантий относительно будущих обновлений, так как он предназначен только для того, чтобы дать пользователям больше времени для перехода на новую версию.

### [Вышел Laravel 10](https://blog.laravel.com/laravel-v10-released)

- 🎬 [Обзор Laravel 10. Что нового в обновлении и попытка апгрейда проекта с Laravel 9 до 10 версии](https://youtu.be/62seEvTRaHM)

Одним из основных изменений, объявленных командой, было добавление деклараций типов во всём наборе пакетов Laravel.
Это привело к проблемам у пользователей при работе с заглушками контроллеров. И через некоторое время команда Laravel решила полностью убрать декларации типов из них.

### [Вышел PHPUnit 10](https://phpunit.de/announcements/phpunit-10.html)

После двух лет разработки Sebastian Bergmann и команда PHPUnit объявили о выходе крупного релиза.

Этот релиз для PHPUnit - то же самое, что PHP 7 для PHP: масштабная чистка, рефакторинг и модернизация, которая закладывает основу для будущего развития.

В нём появились атрибуты, статические провайдеры данных, меньше магии уведомления об ошибках и более простая система событий.

Одним из внутренних изменений в этом выпуске является новая система событий, которая затрагивает разработчиков расширений PHPUnit.

### Грядет большой релиз для [стиля кодирования PER](https://github.com/php-fig/per-coding-style/blob/master/spec.md)

Стиль кодирования PER призван облегчить чтение кода и избавить от вопросов типа «нужно ли добавить пробел?» или «должно ли это утверждение быть в отдельной строке?», позволяя тратить время на то, что действительно важно.

PER - это скользящий документ, что означает, что вместо создания нескольких PSR, команда будет помечать несколько версий.

Версия 1.0.0 была копией PSR-12. Следующая версия будет направлена на обновление спецификации для включения последних возможностей PHP и исправление любых проблем.

Вы можете оставить свой отзыв на вкладке GitHub Issues по адресу [https://github.com/php-fig/per-coding-style](https://github.com/php-fig/per-coding-style).

## PHP Core

Большинство новостей ядра PHP подробно освещаются в
серии [PHP Core Roundup](https://thephp.foundation/blog/tag/roundup/) от PHP Foundation, мы лишь быстро по ним
пробежимся:

### ❌ [RFC: Asymmetric Visibility](https://wiki.php.net/rfc/asymmetric-visibility)

Ilija Tovilo и Larry Garfield получили необходимые отзывы и, возможно, представят пересмотренную версию этого RFC, а пока они сосредоточатся на предложении добавить хуки и аксессоры для свойств.

### ✅ [RFC: Readonly amendments](https://wiki.php.net/rfc/readonly_amendments)

```php
class Foo {    public function __construct(
        public readonly DateTime $bar,
    ) {}
 
    public function __clone()
    {
        $this->bar = clone $this->bar;
        // Это приведёт к фатальной ошибке в PHP <8.2 
        // и будет работать в PHP 8.3+
    }
}
 
$foo = new Foo(new DateTime());
$foo2 = clone $foo;
```

### 📣 [RFC: Path to Saner Increment/Decrement operators](https://wiki.php.net/rfc/saner-inc-dec-operators)

George Peter Banyard предлагает сделать поведение операторов `++` и `--` согласованным.

### 📣 [RFC: Pass Scope to Magic Accessors](https://wiki.php.net/rfc/pass_scope_to_magic_accessors)

Nicolas Grekas и Ilija Tovilo предлагают передавать область видимости в магические аксессоры, чтобы сделать ее получение тривиальным.

В ходе обсуждения участники сообщества предложили добавить отдельную функцию, которая корректно возвращает область видимости, так что авторы RFC могут склониться к этой идее.

### 📊 [RFC: Typed class constants](https://wiki.php.net/rfc/typed_class_constants)

Benas Seliuginas и Máté Kocsis предлагают разрешить объявлять типы для содержимого классов и интерфейсов.

Вот несколько примеров кода, демонстрирующих проблему и то, как типизированные константы могут помочь:

```php
interface I {
    const TEST = "Test"; // Мы можем наивно предположить, что I::TEST - это строка.
}
 
class Foo implements I {
    const TEST = []; // Но это может быть массив...
}
 
class Bar extends Foo {
    const TEST = null; // Или null
}
```

### 📣 [RFC: Working With Substrings](https://wiki.php.net/rfc/working_with_substrings)

Thomas Hruska реализовал множество функций для улучшения качества жизни в PHP и это первый RFC, который привносит некоторые из них в ядро для оптимизации работы с подстроками.

## PhpStorm

- [Открыта программа раннего доступа к PhpStorm 2023.1](https://blog.jetbrains.com/phpstorm/2023/01/phpstorm-2023-1-early-access-program-is-open/)

Уже сейчас вы можете попробовать новые функции из предстоящего крупного релиза, такие как:
- Возможность запуска PHP-скриптов на 3v4l.org.
- Улучшение производительности, включая общие индексы для популярных пакетов PHP.
- Множество улучшений в новом пользовательском интерфейсе.
- Пользовательские проверки поиска и замены на основе Regexp.

- [Command Line Launcher](https://plugins.jetbrains.com/plugin/14337-command-line-launcher) – Плагин для PhpStorm, который помогает запускать и управлять командами терминала. С его помощью можно запускать серверы, Docker или даже выполнять команды на удалённом сервере.

## Инструменты

- [crwlrsoft/crawler](https://github.com/crwlrsoft/crawler) 1.0 – Библиотека для быстрой разработки краулеров и скреперов.

- [olvlvl/composer-attribute-collector](https://github.com/olvlvl/composer-attribute-collector) – Удобный и практически незатратный способ получения целей атрибутов PHP 8.

- [brick/json-mapper](https://github.com/brick/json-mapper) – Отображает данные JSON в сильно типизированные DTO PHP.

- [boxblinkracer/phpunuhi](https://github.com/boxblinkracer/phpunuhi) – Простой композитный фреймворк для проверки и управления переводами.

- [markrogoyski/itertools-php](https://github.com/markrogoyski/itertools-php) – Пакет предоставляет огромный набор функций для работы с итерируемыми коллекциями. Его главное отличие от других библиотек коллекций, таких как Laravel или Doctrine collections, заключается в том, что он не преобразует итерируемые коллекции в массивы. Это означает, что он должен быть гораздо более эффективным с точки зрения использования памяти при работе, например, с генераторами.

- [Crell/mastobot](https://github.com/Crell/mastobot) – Простой бот для составления личного расписания для аккаунтов Mastodon.

- [paratestphp/paratest](https://github.com/paratestphp/paratest) – Вышла версия 7.0 поддержки параллельного тестирования PHPUnit.

- [TheDragonCode/benchmark](https://github.com/TheDragonCode/benchmark) – Простой инструмент для сравнения времени выполнения двух разных блоков кода.

- [parsica-php/parsica](https://github.com/parsica-php/parsica) – Конструктор парсеров с необычным синтаксисом:

```php
$parser = between(char('{'), char('}'), atLeastOne(alphaChar()));
```

- [Sammyjo20/Saloon](https://docs.saloon.dev/upgrade/whats-new-in-v2) 2.0 – Идея этого пакета заключается в том, чтобы упростить создание SDK для сервисов или организовать доступ к различным API в едином стиле.

- [yiisoft/validator](https://github.com/yiisoft/validator) – Мощный пакет валидаторов из фреймворка Yii, который можно использовать и самостоятельно.

## Laravel

- 🎬 [Разбор метода Macro](https://youtu.be/LIoV2kquKMw)
- 🎬 [Разбор Query Builder, Collections, Model в Laravel](https://youtu.be/o94CesRFMuY)

## Symfony

- [Оптимизация OneToMany коллекций Doctrine](https://habr.com/ru/post/715942/)
- [Докеризируем Symfony](https://habr.com/ru/company/otus/blog/715672/)
- [Clean Architecture, DDD, гексагональная архитектура. Разбираем на практике blog на Symfony](https://habr.com/ru/post/718916/)

## Статьи

- [Импорт полной базы ФИАС за 9 часов, How To](https://habr.com/ru/post/714804/)
- [Простой бенчмарк для PHP приложений](https://habr.com/ru/post/714802/)
- [Двухуровневый CI-процесс PHP-проекта](https://habr.com/ru/post/714514/)
- [Как правильно проверять сложность пароля пользователя при регистрации](https://habr.com/ru/post/714478/)
- [Не пытайтесь обезопасить ввод. Экранируйте вывод](https://habr.com/ru/company/otus/blog/712830/)
- [PHPStorm + XDebug + Docker](https://habr.com/ru/post/712670/)
- [Итоги третьего ежегодного опроса PHP-сообщества](https://habr.com/ru/company/skyeng/blog/716316/)
- [Готовим версионирование API в PHP-фреймворках](https://habr.com/ru/company/skyeng/blog/718374/)

## Аудио и видео

- 🎬 [PHP-линч #9](https://www.youtube.com/live/yQHbvTKWpts?feature=share)
- 🎵 [Самописные инфраструктурные компоненты](https://5minphp.ru/episode99/)

## События

- [Podlodka PHP Crew × Точка](https://podlodka.io/phpcrew) – 27 февраля - 3 марта.
