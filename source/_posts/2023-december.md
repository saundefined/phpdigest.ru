---
title: Декабрь 2023
author:
  - sergey
  - roman
date: 2023-12-29
year: 2023
external:
  - telegram: https://t.me/phpdigest
  - phpannotated: https://blog.jetbrains.com/phpstorm/2023/12/php-annotated-december-2023/
  - cutcode: https://youtu.be/zWil99R0deA
---

Подборка свежих новостей, инструментов, видео и материалов из мира PHP.

Приятного чтения!

## Новости

### Вышли [PHP 8.1.27](https://www.php.net/ChangeLog-8.php#8.1.27), [PHP 8.2.14](https://www.php.net/ChangeLog-8.php#8.2.14) и [PHP 8.3.1](https://www.php.net/ChangeLog-8.php#8.3.1)

Выпуски с исправлением ошибок вышли по расписанию.

⛔️ Ветка PHP 8.1 прекратила активную поддержку и будет получать только обновления с исправлениями безопасности.

### Вышел [PhpStorm 2023.3](https://www.jetbrains.com/ru-ru/phpstorm/whatsnew/2022-3/)

В этом большом обновлении представлена официальная версия AI Assistant, добавлена поддержка Pest и PHP 8.3, улучшена
поддержка Symfony, улучшен интерфейс и многое другое.

### Вышел [Xdebug 3.3.0](https://xdebug.org/announcements/2023-11-30)

В этом выпуске добавлена поддержка PHP 8.3, [Flame-графиков](https://derickrethans.nl/flamboyant-flamegraphs.html) и
управляющих сокетов.

### Вышел [FrankenPHP v1.0](https://frankenphp.dev/)

Современный сервер PHP-приложений, написанный на Go, позволяет создать PHP-сервер с помощью всего одной команды.

### [Будущее PHP_CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer/issues/3932)

Основной разработчик CodeSniffer решил отказаться от проекта, но, к счастью, видный член
сообщества, [Juliette Reinders Folmer](https://twitter.com/jrf_nl),
перенесла разработку в новую организацию, [PHPCSStandards](https://github.com/PHPCSStandards/PHP_CodeSniffer).
Работа над инструментом будет продолжена в
репозитории [PHPCSStandards/PHP_CodeSniffer](https://github.com/PHPCSStandards/PHP_CodeSniffer).

Имя пакета composer пока не изменится; нет необходимости менять ваши зависимости.

Juliette и соавторы уже выпустили
[PHP_CodeSniffer 3.8.0](https://github.com/PHPCSStandards/PHP_CodeSniffer/releases/tag/3.8.0) с множеством улучшений.

## PHP Core

Большинство новостей ядра PHP подробно освещаются в
серии [PHP Core Roundup](https://thephp.foundation/blog/tag/roundup/) от PHP Foundation, мы лишь быстро по ним
пробежимся:

### 📣 [RFC: #[NotSerializable]](https://wiki.php.net/rfc/not_serializable)

Max Semenik предлагает добавить новый атрибут `#[NotSerializable]` для предотвращения сериализации класса.
Это может помочь писать меньше кода и лучше анализироваться статическими анализаторами:

```php
#[NotSerializable]
class MyClass
{
}

serialize(new MyClass()); // Exception: Serialization of 'MyClass' is not allowed
```

### 📣 [RFC: Policy Repository](https://wiki.php.net/rfc/policy-repository)

В настоящее время политики в отношении голосования по RFC, процесса выпуска, классификации безопасности и рекомендаций
по именованию хранятся в разных местах.

Derick Rethans предлагает создать новый Git-репозиторий, чтобы собрать все политики в одном месте.

### 📊 [RFC: Improve callbacks in ext/dom and ext/xsl](https://wiki.php.net/rfc/improve_callbacks_dom_and_xsl)

Niels Dossche предлагает разрешить методам `XSLTProcessor::registerPHPFunctions()` и `DOMXPath::registerPhpFunctions()`
использовать тип `callable`.

### ❌ [RFC: Final anonymous classes](https://wiki.php.net/rfc/final_anonymous_classes)

Отчасти из-за сложности постановки вопроса RFC был отклонён.

После получения обратной связи Daniil Gentili выбрал основное направление и
предложил [новую версию RFC](https://wiki.php.net/rfc/final_by_default_anonymous_classes): сделать все
анонимные классы по умолчанию окончательными, предоставить необязательное ключевое слово `open`, чтобы сделать их
неокончательными (как в Kotlin, `new open class {}`).

### ✅ [RFC: Change how JIT is disabled by default](https://wiki.php.net/rfc/jit_config_defaults)

PHP 8.4 будет поставляться с отключенным по умолчанию JIT, за счёт установленной опции `opcache.jit=disable`, а значение
опции `jit_buffer_size` по умолчанию будет увеличено до `64`.

В настоящее время JIT работает в режиме `tracing`, но по умолчанию отключён с помощью опции `opcache.jit_buffer_size=0`.

### 🫣 [new MyClass()->method() без скобок!](https://github.com/php/php-src/pull/13029)

Валентин Удальцов реализовал обращение к объектам, созданным через `new`, не оборачивая их в скобки.
Во избежание неоднозначности это будет работать только при наличии скобок аргументов конструктора.
Поддерживаются также динамические имена классов и анонимные классы.

Предложение ещё не оформлено в RFC.

### [Новый PECL появится в 2024 году](https://twitter.com/ThePHPF/status/1732082795831337402)

PHP Foundation собирается пересмотреть способ установки модулей в PHP.

В настоящее время модули распространяются с помощью устаревшего сайта [pecl.php.net](https://pecl.php.net) и
инструмента `pecl`.
Цель состоит в том, чтобы предоставить современную альтернативу, которая будет проще в использовании как для
пользователей, так и для разработчиков модулей.

## Инструменты

- [staabm/phpstan-todo-by](https://github.com/staabm/phpstan-todo-by) – Инструмент, позволяющий оставлять
  комментарии `todo` с датами истечения срока действия. Пока не выяснилось, что существуют языки программирования, такие
  как [Gleam](https://gleam.run/book/tour/todo-and-panic.html), которые предоставляют функцию `todo` в качестве языковой
  функции.

- [spatie/image](https://github.com/spatie/image) v3 – Управляйте изображениями с помощью выразительного API. V3 больше
  не зависит от `league/glide`.

- [bpolaszek/bentools-etl](https://github.com/bpolaszek/bentools-etl) – Библиотека ETL (Extract / Transform / Load) с
  принципами SOLID + почти полное отсутствие зависимостей.

- [samdark/php-fpm_tuner](https://github.com/samdark/php-fpm_tuner) – Скрипт, который помогает настроить конфигурацию
  PHP-FPM на основе доступной памяти, ядер процессора и количества памяти, потребляемой воркерами.

- [super-linter/super-linter](https://github.com/super-linter/super-linter) – Комбинация линтеров, которую можно
  установить как GitHub Action. Это может быть полезно, если у вас проекты, использующие разные языки.

- [gherkins/regexpbuilderphp](https://github.com/gherkins/regexpbuilderphp) – Человекочитаемый конструктор регулярных выражений.

- [maximal/taran](https://github.com/maximal/taran) – Простой инструмент для нагрузочного тестирования веб-приложений.

- [serversideup/docker-php](https://github.com/serversideup/docker-php) – Готовые к продакшену образы Docker для PHP.

- [OrbStack](https://orbstack.dev/) – Лёгкая альтернатива Docker Desktop.

- [mnapoli/sqlite-s3](https://github.com/mnapoli/sqlite-s3) – Бессерверная база данных для разработчиков: SQLite, поддерживаемая S3.

- [typhoon-php/overloading](https://github.com/typhoon-php/overloading) – Реализация функции перегрузки недостающих методов в PHP.

## Laravel

- [Обзор LiveWire 3 и Volt](https://habr.com/ru/articles/781142/)
- 🎬 [Реализация полиморфных комментариев и лайков на Livewire + Volt](https://youtu.be/1hnv-lE5bKw)
- 🎬 [Distributed Cron scheduling](https://www.youtube.com/live/4VaEy1h3hpo)
- 🎬 [Утилита Number в Laravel](https://youtu.be/9JFOdA7DBf8)
- 🎬 [MoonShine Screencasts](https://youtube.com/playlist?list=PLTucyHptHtTnfDI18bZnYEgvJIFmW8fGy)

## Yii

- Вышел [yiisoft/db-migration](https://github.com/yiisoft/db-migration) 1.0

  Первый стабильный релиз миграций на базе [yiisoft/db](https://github.com/yiisoft/db).

  Из коробки поддерживаются следующие СУБД:

    - MSSQL 2017, 2019, 2022,
    - MySQL 5.7–8.0,
    - MariaDB 10.4–10.9,
    - Oracle 12c–21c,
    - PostgreSQL 9.6–15,
    - SQLite 3.3 и выше.

  Пакет предоставляет возможность работы с миграциями как через консоль Yii или Symfony, так и через отдельную
  независимую утилиту.

- Вышел [yiisoft/injector](https://github.com/yiisoft/injector/) 1.2

  Пакет теперь может работать без контейнера, для работы теперь не требуются никакие зависимости.

Более подробно новости Yii освещаются в канале «[Хроники Yii3](https://t.me/yii3chronicles)».

## Symfony

- ❗️[Состоялся последний релиз Twig 2](https://symfony.com/blog/the-last-twig-2-release)

## Статьи

- [Выбираем подходящий PHP-фреймворк для проекта](https://habr.com/ru/companies/pyrobyte/articles/780494/)
- [Создаём графический информер на PHP](https://habr.com/ru/articles/780156/)
- [Недокументированная возможность в Phpstorm: нативная консоль php -a с автодополнением из IDE](https://habr.com/ru/articles/779548/)
- [Версионная миграция структуры базы данных через PHP атрибуты](https://habr.com/ru/articles/783940/)

## Видео

- [OpenSource как важный компонент экосистемы](https://youtu.be/HZQkC3klaZk)
- [PHP Community meetup: 4 доклада, апдейты PHP 8.3 и итоги года](https://www.youtube.com/live/tF9s785SxAM)
- [Все про PHP attributes](https://www.youtube.com/live/7AxPmluYYZQ)
