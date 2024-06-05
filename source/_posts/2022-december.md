---
title: Декабрь 2022
author:
  - sergey
  - roman
date: 2022-12-31
external:
  - telegram: https://t.me/phpdigest
  - phpannotated: https://blog.jetbrains.com/phpstorm/2022/12/php-annotated-december-2022/
  - cutcode: https://youtu.be/rX_EKCU7koc
---

Подборка свежих новостей, инструментов, видео и материалов из мира PHP.

Приятного чтения!

## Новости

### Вышел PHP 8.2.0!

PHP 8.2 — большое обновление языка PHP. Оно содержит множество новых возможностей, включая readonly-классы,
самостоятельные типы `null`, `false` и `true`, устаревшие динамические свойства, улучшение производительности и многое
другое.

Подробный список нововведений в PHP 8.2 можно найти на [странице релиза](https://php.net/releases/8.2/ru.php) и
в [руководстве по обновлению](https://www.php.net/manual/ru/migration82.php).

<details>
  <summary>Установка/Обновление до PHP 8.2</summary>
    <p><strong>Windows:</strong> Скомпилированные двоичные файлы доступны на сайте <a href="https://windows.php.net">windows.php.net</a>.</p>
    <p><strong>Ubuntu/Debian:</strong> PHP 8.2 доступен на <a href="https://launchpad.net/~ondrej/+archive/ubuntu/php/">ondrej/php</a> PPA.</p>
    <p><strong>Fedora/RHEL/CentOS/Alma/Rocky:</strong> Доступен в виде коллекции программ php82 в <a href="https://blog.remirepo.net/">репозитории Remi</a>.</p>
    <p><strong>macOS:</strong> PHP 8.2 можно установить с помощью Homebrew совместно с <a href="https://github.com/shivammathur/homebrew-php/packages">shivammathur/homebrew-php</a>.</p>
    <p><strong>Docker:</strong> Образы PHP 8.2 доступны на <a href="https://hub.docker.com/_/php">Docker Hub</a> с <a href="https://hub.docker.com/_/php/tags?page=1&name=8.2">тегами 8.2*</a>.</p>
</details>

### ⛔ [Поддержка PHP 7 завершена](https://www.php.net/eol.php)

[PHP 7.4.33](https://www.php.net/archive/2022.php#2022-11-03-1) стал последним выпуском PHP 7. PHP 7 больше не будет
получать официальных обновлений безопасности.

Однако основные дистрибутивы, такие как RedHat или Ubuntu, будут поставлять обновления безопасности для PHP 7.4 в
составе своих LTS.

### Вышли [PHP 8.0.26](https://www.php.net/archive/2022.php#2022-11-26-1) и [PHP 8.1.13](https://www.php.net/archive/2022.php#2022-11-24-1)

Выпуски с исправлениями ошибок вышли по расписанию.

❗ Ветка PHP 8.0 прекратила активную поддержку и будет получать только обновления для исправлений безопасности.

### 🎂 PHP Foundation исполняется 1 год

Фонд PHP Foundation был [основан год назад](https://blog.jetbrains.com/phpstorm/2021/11/the-php-foundation/).

За прошедший год PHP Foundation поддержал работу 6 [основных разработчиков](https://thephp.foundation/structure/) и внёс
значительный вклад в развитие языка PHP.

Ознакомьтесь
с [отчётом о прозрачности за 2022 год](https://thephp.foundation/blog/2022/11/22/transparency-and-impact-report-2022/),
чтобы узнать, чего удалось достичь, и увидеть основные цели на 2023 год.

Рассмотрите возможность поддержать PHP Foundation с помощью [OpenCollective](https://opencollective.com/phpfoundation).

### [PhpStorm 2022.3](https://blog.jetbrains.com/phpstorm/2022/12/phpstorm-2022-3-whats-new/)

В этом крупном обновлении добавлен предварительный просмотр нового пользовательского интерфейса, добавлена полная
поддержку PHP 8.2, поддержка Redis в инструментах баз данных, Code Vision для PHP, предварительный просмотр быстрых
исправлений, проверка конфигурации Xdebug, поддержка ParaTest, режим чтения для PHPDoc и многое другое.

### [Вышел Symfony 6.2](https://symfony.com/blog/symfony-6-2-0-released)

Улучшенная поддержка emoji, аутентификатор маркеров доступа, встроенные атрибуты Cache+Security+Template+Doctrine,
улучшенная поддержка перечислений и многое другое.

Ознакомьтесь со списком [новых возможностей](https://symfony.com/blog/symfony-6-2-curated-new-features), чтобы узнать об
основных моментах этого нового выпуска.

### ✅ [Принят PSR-20: Clock](https://www.php-fig.org/psr/psr-20/)

Группа PHP-FIG приняла и пометила PSR-20 с рекомендованным интерфейсом `ClockInterface` для даты и времени.

### [Вышел Psalm 5](https://psalm.dev/articles/psalm-5)

В этом выпуске появилось несколько новых функций: `list{int, string, float}`, `properties-of`, шаблоны переменных
и `int-range<x, y>`.

### [Вышел Xdebug 3.2.0](https://xdebug.org/announcements/2022-12-08)

В этом выпуске добавлена поддержка PHP 8.2 и прекращена поддержка PHP 7.2-7.4. В нём появилась
возможность [проверять возвращаемые значения функции](https://www.youtube.com/watch?v=TNOGhUgY6Sc) и улучшены
предупреждающие сообщения.

### [Вышел PHPStan 1.9.0](https://phpstan.org/blog/phpstan-1-9-0-with-phpdoc-asserts-list-type)

В этом обновлении добавили утверждения PHPDoc, типы списков, тег `@param-out` для параметров, назначаемых по ссылке, и
другие улучшения.

### [Вышел Drupal 10](https://www.drupal.org/blog/drupal-10-0-0)

Это обновление добавляет множество улучшений во все системы, а для работы теперь требуется Symfony 6.2 и PHP 8.1.

## PHP Core

Большинство новостей ядра PHP подробно освещаются в
серии [PHP Core Roundup](https://thephp.foundation/blog/tag/roundup/) от PHP Foundation, мы лишь быстро по ним
пробежимся:

### 📣 [PHP RFC: Dynamic class constant fetch](https://wiki.php.net/rfc/dynamic_class_constant_fetch)

Ilija Tovilo предложил ввести синтаксис для поиска констант классов.

```php
class Foo {    
    const BAR = 'bar';
}
$bar = 'BAR';
 
// В настоящее время это синтаксическая ошибка
echo Foo::{$bar}; 
 
// Вместо этого следует использовать функцию `constant`.
echo constant(Foo::class . '::' . $bar);
```

### 📣 [RFC: Arbitrary static variable initializers](https://wiki.php.net/rfc/arbitrary_static_variable_initializers)

Ilija Tovilo предложил расширить синтаксис, позволяющий инициализатору статической переменной содержать произвольные
выражения.

```php
function bar() {    
    echo "вызвана функция bar()\n";
    return 1;
}
 
function foo() {
    static $i = bar();
    echo $i++, "\n";
}
 
foo();
```

### 📣 [RFC: Readonly amendments](https://wiki.php.net/rfc/readonly_amendments)

Nicolas Grekas и Máté Kocsis предложили улучшить свойства и классы readonly, позволив не-readonly классам расширять
классы readonly и разрешив свойствам readonly повторно инициализироваться при клонировании:

```php
readonly class Foo {
    public function __construct(
        public DateTime $bar
    ) {}
 
    public function __clone()
    {
        $this->bar = clone $this->bar;
    }
}
 
$foo = new Foo(new DateTime());
$foo2 = clone $foo;
```

### 📊 [RFC: More Appropriate Date/Time Exceptions](https://wiki.php.net/rfc/datetime-exceptions)

Derick Rethans предложил ввести специфические исключения и ошибки для модуля Date/Time, где это имеет смысл.

### 📣 [RFC: `List\unique()` and `Assoc\unique()`](https://wiki.php.net/rfc/list_assoc_unique)

Ilija Tovilo предложил добавить две новые функции для случаев, которые не поддерживаются функцией `array_unique()`:

```php
List\unique([1, 2, 3, 1, '2', 3.0, new Foo, ['bar']]);
// > [1, 2, 3, '2', 3.0, Foo, ['bar']]

Assoc\unique(['foo' => 'foo', 'bar' => 'bar', 'baz' => 'foo']);
// > ['foo' => 'foo', 'bar' => 'bar']
```

### 📣 [RFC: Unicode Text Processing](https://wiki.php.net/rfc/unicode_text_processing)

Derick Rethans предлагает ввести новый класс `Text`, чтобы сделать использование и обработку текста Unicode значительно
более удобным для разработчиков и без необходимости разбираться во всех тонкостях обработки текста Unicode.

## Инструменты

- [Marcel Pociot](https://twitter.com/marcelpociot/status/1593371441591947265) создал аккуратного бота для GitHub,
  который оценивает блоки PHP-кода в GitHub Issues, если вы упомянете его [@phptinker](https://github.com/phptinker):

  ![](/assets/images/post/2022-december/phptinker.png)

- [ramsey/uuid](https://github.com/ramsey/uuid) – В новой версии пакета для генерации универсальных уникальных
  идентификаторов появилась поддержка UUID v8 и пользовательских UUID.

- [loophp/collection](https://github.com/loophp/collection) – Класс модульных коллекций, дружественный к памяти,
  выпустил большое обновление.

- [php-rust-tools/parser](https://github.com/php-rust-tools/parser) – PHP-парсер,
  написанный [Ryan Chandler](https://twitter.com/ryangjchandler) и [Saif Eddin](https://twitter.com/azjezz) на Rust.

  Вас также может заинтересовать [phper](https://docs.rs/phper/latest/phper/) – инструмент, позволяющий писать
  PHP-модули, используя чистый и безопасный Rust, когда это возможно.

- [ScriptFUSION/Porter](https://github.com/ScriptFUSION/Porter) – Долговечный и асинхронный импорт данных для
  масштабного потребления данных и публикации тестируемых SDK.

- ChatGPT захватывает всё вокруг, поэтому вам стоит обратить внимание на PHP-клиент для OpenAI:

    - [openai-php/client](https://github.com/openai-php/client) – Насыщенный API-клиент, позволяющий взаимодействовать с
      OpenAI API.
    - [orhanerday/open-ai](https://github.com/orhanerday/open-ai) – PHP SDK для доступа к API OpenAI GPT-3.

- [qossmic/deptrac](https://github.com/qossmic/deptrac) – Инструмент анализа архитектуры проекта для определения
  зависимостей между уровнями приложений.

- [rob893/emoji-cache](https://github.com/rob893/emoji-cache) – Реализация кеша LRU, но все идентификаторы - эмодзи.

  ![](/assets/images/post/2022-december/cache.png)

### PhpStorm

- [AMA с командой PhpStorm](https://www.reddit.com/r/PHP/comments/ys1mc8/ama_with_the_phpstorm_team_from_jetbrains_on/)
- [VKCOM/modulite](https://vkcom.github.io/modulite/) – Честная модульность внутри PHP.

## Laravel

- 🎬 [AMA о Laravel с Taylor Otwell](https://youtu.be/Ylpwkzo_rFE)
- [Как мы провели второй русскоязычный Laravel-митап](https://habr.com/ru/post/699770/)
- [protonemedia/laravel-splade](https://github.com/protonemedia/laravel-splade) – Пакет для создания интерактивности
  непосредственно в Blade, без необходимости писать JS-код.

## Yii

- [Новости Yii 2022, выпуск 2](https://habr.com/ru/post/700420/)
- [Yii3 Overview 2. Вспомогательные инструменты разработки](https://habr.com/ru/post/697586/)

## Статьи

- [Как мы наш большой проект на KPHP мигрировали](https://habr.com/ru/post/686496/)
- [KPHP спустя 2 года](https://habr.com/ru/company/vk/blog/698294/)
- [Старый код в новой обёртке — как наша команда избавлялась от legacy](https://habr.com/ru/post/697904/)

## Видео

- На YouTube канале PHP Point вышли новые
  выпуски [PHP-линча](https://www.youtube.com/playlist?list=PLbaJpLafV4JGhNHMU_PMy8RCou1WGRqpT), где Валентин Удальцов
  разбирает несколько пакетов и комментирует код.
