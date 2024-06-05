---
title: Ноябрь 2023
author:
  - sergey
  - roman
date: 2023-11-30
external:
  - telegram: https://t.me/phpdigest
  - phpannotated: https://blog.jetbrains.com/phpstorm/2023/12/php-annotated-november-2023/
  - cutcode: https://youtu.be/2FQ2poFX3sA
---

Подборка свежих новостей, инструментов, видео и материалов из мира PHP.

Приятного чтения!

## Новости

### Вышел PHP 8.3.0!

PHP 8.3 – большое обновление языка. Оно содержит множество новых возможностей, таких как явная типизация констант
классов, глубокое клонирование readonly-свойств, а также улучшения класса Randomizer. Как всегда, в нём также улучшена
производительность, исправлены ошибки и многое другое.

Подробный список нововведений в PHP 8.3 можно найти на [странице релиза](https://php.net/releases/8.3/ru.php),
в [руководстве по обновлению](https://www.php.net/manual/ru/migration83.php), а также узнать немного больше о релизе
из [анонса PHP Foundation](https://thephp.foundation/blog/2023/11/23/php-83/).

<details>
  <summary>Установка/Обновление до PHP 8.3</summary>
    <p><strong>Windows:</strong> Скомпилированные двоичные файлы доступны на сайте <a href="https://windows.php.net">windows.php.net</a>.</p>
    <p><strong>Ubuntu/Debian:</strong> PHP 8.3 доступен на <a href="https://launchpad.net/~ondrej/+archive/ubuntu/php/">ondrej/php</a> PPA.</p>
    <p><strong>Fedora/RHEL/CentOS/Alma/Rocky:</strong> Доступен в виде коллекции программ php83 в <a href="https://blog.remirepo.net/">репозитории Remi</a>.</p>
    <p><strong>macOS:</strong> PHP 8.3 можно установить с помощью Homebrew совместно с <a href="https://github.com/shivammathur/homebrew-php/packages">shivammathur/homebrew-php</a>.</p>
    <p><strong>Docker:</strong> Образы PHP 8.3 доступны на <a href="https://hub.docker.com/_/php">Docker Hub</a> с <a href="https://hub.docker.com/_/php/tags?page=1&name=8.3">тегами 8.3*</a>.</p>
</details>

### ⛔ [Поддержка PHP 8.0 завершена](https://www.php.net/eol.php)

PHP 8.0.30 стал последним выпуском PHP 8.0.
Ветка больше не будет получать официальных обновлений безопасности.

### Вышли PHP 8.1.26 и PHP 8.2.13

Выпуски [PHP 8.1.26](https://php.net/ChangeLog-8#8.1.26) и [PHP 8.2.13](https://php.net/ChangeLog-8#8.2.13) с
исправлениями ошибок вышли по расписанию.

Ветка PHP 8.1 получит ещё один выпуск – PHP 8.1.27, который станет последним выпуском с исправлением ошибок, далее будут
выходить только выпуски с исправлением ошибок безопасности.

### 🎂 PHP Foundation исполнилось 2 года

Фонд PHP Foundation был [основан два года назад](https://blog.jetbrains.com/phpstorm/2021/11/the-php-foundation/).

За прошедший год PHP Foundation поддержал работу
6 [основных разработчиков](https://thephp.foundation/structure/#core_developers) и внёс значительный вклад в развитие
языка PHP.

Ознакомьтесь
с [отчётом PHP Foundation за ноябрь 2023](https://thephp.foundation/blog/2023/11/27/php-foundation-update-november-2023/).

Поддержать PHP Foundation можно с помощью [OpenCollective](https://opencollective.com/phpfoundation)
или [GitHub Sponsors](https://github.com/sponsors/thephpf).

### [Экосистема разработки в 2023 году](https://www.jetbrains.com/ru-ru/lp/devecosystem-2023/)

Опубликованы результаты ежегодного исследования JetBrains, в
котором приняли участие 26 348 разработчиков со всего мира.

Три самые [популярные функции](https://www.jetbrains.com/ru-ru/lp/devecosystem-2023/php/#php_top_features), которые ждут
в PHP – Типизированные массивы, тестирование производительности и дженерики.

Напишите в комментариях, какие функции хотели бы вы добавить в PHP.

## PHP Core

Большинство новостей ядра PHP подробно освещаются в
серии [PHP Core Roundup](https://thephp.foundation/blog/tag/roundup/) от PHP Foundation, мы лишь быстро по ним
пробежимся:

### 📣 [RFC: Resource to object conversion](https://wiki.php.net/rfc/resource_to_object_conversion)

Ресурсы – устаревшая структура данных, которая уже давно вытеснена объектами. Работа
над [заменой ресурсов на объекты](https://php.watch/articles/resource-object) началась еще в 2013 году, но большинство
модулей перешли на неё только в PHP 8.0.

Máté Kocsis предлагает осуществить миграцию в оставшихся модулях и определить политику для дальнейшего развития.

### 📣 [RFC: Release cycle update](https://wiki.php.net/rfc/release_cycle_update)

Срок жизни версии PHP составляет 3 года. Многие считают, что это мало, а предрелизный период, составляющий полгода,
наоборот, слишком много.

Jakub Zelenka, один из релиз-менеджеров PHP 8.3, предлагает увеличить срок жизни версии PHP до 4 лет (2 года на
сопровождение и 2 года на обновления безопасности) и пересмотреть предрелизную фазу тестирования.

### 📣 [RFC: Change how JIT is disabled by default](https://wiki.php.net/rfc/jit_config_defaults)

В настоящее время JIT работает в режиме tracing, но по умолчанию отключён с помощью опции `opcache.jit_buffer_size = 0`.

RFC предлагает отключить JIT по умолчанию, установив опцию `opcache.jit = disable` и увеличить
значение `jit_buffer_size` по умолчанию до `64`.

### 📣 [RFC: Final anonymous classes](https://wiki.php.net/rfc/final_anonymous_classes)

RFC предлагает один из трёх вариантов улучшения работы с анонимными классами:

1. Добавить поддержку окончательных анонимных классов (синтаксис `new final class {}`, без изменений в обратной
   совместимости).

2. ИЛИ сделать все анонимные классы окончательными по умолчанию, без возможности сделать их окончательными (изменение в
   обратной совместимости).

3. ИЛИ сделать все анонимные классы окончательными по умолчанию, предоставить необязательное ключевое слово `open`,
   чтобы сделать их неокончательными (как в Kotlin, `new open class {}`, изменение в обратной совместимости).

### 📣 [RFC: Improve callbacks in ext/dom and ext/xsl](https://wiki.php.net/rfc/improve_callbacks_dom_and_xsl)

Niels Dossche предлагает разрешить использовать callback-функции в методах `XSLTProcessor::registerPHPFunctions()`
и `DOMXPath::registerPhpFunctions()`.

### 📣 [RFC: Property Hooks](https://wiki.php.net/rfc/resource_to_object_conversion)

В этом RFC Ilija Tovillo и Larry Garfield предлагают объявлять виртуальные свойства с помощью функций get/set.

Дизайн и синтаксис больше всего похожи на [Kotlin](https://kotlinlang.org/docs/properties.html#getters-and-setters),
хотя в нём также прослеживается влияние C#
и [Swift](https://docs.swift.org/swift-book/documentation/the-swift-programming-language/properties/#Computed-Properties).

```php
<?php

class User implements Named
{
    private bool $isModified = false;

    public function __construct(private string $first, private string $last) {}

    public string $fullName {
        // Override the "read" action with arbitrary logic.
        get => $this->first . " " . $this->last;
 
        // Override the "write" action with arbitrary logic.
        set($value) => [$this->first, $this->last] = explode(' ', $value);
    }
}
```

Интересным побочным эффектом этого RFC является то, что он позволяет объявлять абстрактные свойства в интерфейсах:

```php
<?php

abstract class A
{
    // Extending classes must have a publicly-gettable property.
    abstract public string $readable { get; }
 
    // Extending classes must have a protected- or public-writeable property.
    abstract protected string $writeable { set; }
 
    // Extending classes must have a protected or public symmetric property.
    abstract protected string $both { get; set; }   
}
 
class C extends A
{
    // This satisfies the requirement and also makes it settable, which is valid.
    public string $readable;
 
    // This would NOT satisfy the requirement, as it is not publicly readable.
    protected string $readable;
 
    // This satisfies the requirement exactly, so is sufficient. It may only
    // be written to, and only from protected scope.    
    protected string $writeable {
        set => $field = $value;
    }
 
    // This expands the visibility from protected to public, which is fine.
    public string $both;
}
```

Вы уже можете попробовать хуки свойств на [3v4l.org](https://3v4l.org/),
благодаря [Sjon Hortensius](https://github.com/sponsors/SjonHortensius).

И оставить свой отзыв на [RFC Vote: Property Hooks](https://rfc.stitcher.io/rfc/property-hooks).

## Инструменты

- [php-tui/php-tui](https://github.com/php-tui/php-tui) – Фреймворк для создания консольных приложений.

- [Crell/Serde](https://github.com/Crell/Serde) – Надёжная библиотека Serde (сериализация/десериализация).

- [buggregator/server](https://github.com/buggregator/server) – Лёгкий автономный сервер, предлагающий ряд отладочных
  функций для PHP-приложений, включая Xhprof Profiler, Symfony VarDumper Server, SMTP Server, Sentry Compatibility,
  Monolog Server и HTTP Requests Dump Server. В комплект поставки
  входит [buggregator/trap](https://github.com/buggregator/trap) – консольный мини-сервер и помощник для более удобной
  отладки в PHP.

- [NoiseByNorthwest/php-spx](https://github.com/NoiseByNorthwest/php-spx) – Простой и понятный модуль для профилирования
  PHP со встроенным веб-интерфейсом.

- [reliforp/reli-prof](https://github.com/reliforp/reli-prof) – Профилировщик выборки или профилировщик памяти для PHP,
  написанный на PHP, который считывает информацию о запущенном PHP VM извне процесса. Позволяет находить узкие места в
  производительности или утечки памяти скриптов без изменения целевого скрипта или загрузки модулей. В качестве
  альтернативы можно попробовать [arnaud-lb/php-memory-profiler](https://github.com/arnaud-lb/php-memory-profiler) –
  модуль для профилирования памяти для PHP, он помогает найти утечки памяти в PHP-скриптах.

- [saloonphp/xml-wrangler](https://github.com/saloonphp/xml-wrangler) – Библиотека, предназначенная для облегчения
  чтения и записи XML. Также ознакомьтесь с пакетом [veewee/xml](https://github.com/veewee/xml), предоставляющий все
  инструменты для работы с XML в PHP без лишней головной боли.

- [jolicode/JoliMarkdown](https://github.com/jolicode/JoliMarkdown) – Синтаксический корректор для контента в формате
  markdown. Ознакомьтесь с подробностями
  в [знакомстве с JoliMarkdown](https://jolicode.com/blog/introducing-jolimarkdown-for-a-more-robust-and-rigorous-markdown-content).

- [cerbero90/lazy-json](https://github.com/cerbero90/lazy-json) – Пакет, не зависящий от фреймворка, для рекурсивной
  загрузки JSON любого размера и из любого источника в ленивые коллекции Laravel.

- [staabm/phpstan-baseline-analysis](https://github.com/staabm/phpstan-baseline-analysis) – Анализирует базовые файлы
  PHPStan и создаёт агрегированные отчёты о тенденциях ошибок.

- [hirethunk/verbs](https://github.com/hirethunk/verbs) – Пакет для поиска событий.

- [spiral/json-schema-generator](https://github.com/spiral/json-schema-generator) – Предоставляет возможность
  генерировать JSON-схемы из классов DTO.

- [krowinski/php-mysql-replication](https://github.com/krowinski/php-mysql-replication) – Реализация протокола
  репликации MySQL на чистом PHP. Позволяет получать события типа insert, update, delete с их данными и необработанными
  SQL-запросами.

## Laravel

- [Вышел Tinkerwell 4](https://tinkerwell.app/whats-new-in-tinkerwell-4)

Вышла новая версия популярного инструмента для запуска PHP-кода с множеством новых полезных функций, включая поддержку
искусственного интеллекта, нового режима более детального вывода информации, пользовательских темы, средства просмотра
логов и многое другое.

- [Представлен Laravel Pulse](https://pulse.laravel.com/)

Laravel Pulse предоставляет краткую информацию о производительности и использовании вашего приложения. Отслеживайте
узкие места, такие как медленные задания и маршруты, находите самых активных пользователей и многое другое.

Он бесплатный, с открытым исходным кодом и готов к расширению.

- [MoonShine 2.0. Что нового?](https://habr.com/ru/articles/774832/)
- [Альтернатива Nova: почему решили перейти с самописного решения на Orchid](https://habr.com/ru/companies/pyrobyte/articles/774304/)
- [Сортировка в Laravel по полям relation-ов](https://habr.com/ru/articles/770732/)
- [Взгляните на то, что будет в Laravel 11](https://cutcode.dev/articles/vzglianite-na-to-cto-budet-v-laravel-11)
- 🎬 [Подробный гайд по Form Requests в Laravel](https://youtu.be/SLw--GuSp2A)
- 🎬 [Разработка собственного драйвера Socialite](https://youtu.be/H11EpIgW47c)

## Symfony

- [Вышли Symfony 6.4 и 7.0](https://symfony.com/7)

Обе версии содержат одинаковый набор функций, за исключением поддержки устаревших функций.

Symfony помечает некоторые функции устаревшими и удаляет их спустя два года. Symfony 6.4 будет содержать устаревшие
функции, начиная с Symfony 6.1, а Symfony 7.0 будет выпущен без поддержки устаревших функций.

Также Symfony 6.4 – версия с долгосрочной поддержкой, которая получает исправления ошибок в течение 3 лет и ошибки
безопасности в течение ещё 1 года.

Symfony 7.0 – обычная версия, которая будет поддерживаться только 8 месяцев. Ознакомьтесь со списком новых возможностей
в серии Living on the edge, чтобы узнать об основных особенностях этих выпусков.

- ❗️[CVE-2023-46733: Possible session fixation](https://symfony.com/blog/cve-2023-46733-possible-session-fixation)
- ❗️[CVE-2023-46734: Potential XSS vulnerabilities in CodeExtension filters](https://symfony.com/blog/cve-2023-46734-potential-xss-vulnerabilities-in-codeextension-filters)
- ❗[️CVE-2023-46735: Potential XSS in WebhookController](https://symfony.com/blog/cve-2023-46735-potential-xss-in-webhookcontroller)
- [Symfony под капотом: Symfony Messenger и механизм повторной обработки сообщений при ошибках](https://habr.com/ru/companies/sravni/articles/773898/)
- [Типичный Swagger без гмо](https://habr.com/ru/articles/775056/)

## Yii

- Вышел [yiisoft/db](https://github.com/yiisoft/db) 1.2
- Вышел [yiisoft/widget](https://github.com/yiisoft/widget) 2.1
- Вышел [yiisoft/config](https://github.com/yiisoft/config) 1.4

## Статьи

- [Безотказные очереди в RabbitMQ: Гарантированная доставка сообщений](https://habr.com/ru/articles/773636/)
- [А был ли баг? Может бага и не было? Зачем, как и чем тестировать PHP код](https://habr.com/ru/articles/771804/)
- [Что такое гексагональная архитектура. Разделение бизнес-логики и инфраструктуры с помощью портов и адаптеров](https://habr.com/ru/companies/timeweb/articles/771338/)
- [PSR и суффиксы для интерфейсов](https://leonidchernenko.ru/psr-interface-suffixes/)

## Видео

- [RND PHP #6](https://www.youtube.com/live/8ZzAqhgmBFg)
- [Александр Макаров - «Следуй за мечтой»](https://youtu.be/Wbx9z_5aOZw)
- [LivePHP SPb Meetup #1](https://www.youtube.com/live/b1NE20DD2cc)

## Аудио

- [Сколько можно заработать на курсе по PHP?](https://5minphp.ru/episode100/)