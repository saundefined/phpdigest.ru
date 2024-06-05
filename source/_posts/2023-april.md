---
title: Апрель 2023
author:
  - sergey
  - roman
date: 2023-04-30
external:
  - telegram: https://t.me/phpdigest
  - phpannotated: https://blog.jetbrains.com/phpstorm/2023/04/php-annotated-april-2023/
  - cutcode: https://youtu.be/spBM6-yrnJ8
---

Подборка свежих новостей, инструментов, видео и материалов из мира PHP.

Приятного чтения!

## Новости

### Вышли [PHP 8.1.18](https://www.php.net/ChangeLog-8.php#8.1.18) и [PHP 8.2.5](https://www.php.net/ChangeLog-8.php#8.2.5)

Выпуски с исправлениями ошибок вышли по расписанию.

### [Вышел Pest 2.0](https://pestphp.com/docs/announcing-pest2)

В Pest 2 появилось множество новых возможностей, таких как повторное тестирование, профилирование медленных тестов, поддержка нового плагина arch и многое другое.

### [Вышел Bref 2.0](https://bref.sh/docs/news/02-bref-2.0.html)

Bref позволяет с лёгкостью развёртывать PHP-приложения на бессерверной платформе AWS Lambda.

В этом обновлении упрощена настройка PHP, улучшена интеграция с Laravel, ускорено развёртывание, автоматическая загрузка секретов в переменные окружения во время выполнения, а также упрощён `docker-compose.yml` для локальной разработки.

Подпишитесь на [рассылку Serverless PHP](https://serverless-php.news/), чтобы получать больше материалов по этой теме.

### Вышел PER Coding Style 2.0

Новая версия руководства по стилю кодирования PHP исправляет некоторые проблемы, а также обновляет руководство с учётом последних дополнений к синтаксису PHP.

[Посмотрите на GitHub](https://github.com/php-fig/per-coding-style/compare/8201676d799ca5d03bec8ee702df1dd3fda8d2b0..2.0.0), чем PER CS 2.0 отличается от PSR-12.

### [Вышел PhpStorm 2023.1](https://blog.jetbrains.com/phpstorm/2023/04/phpstorm-2023-1/)

Это первое крупное обновление PhpStorm в этом году. В нём появилась интеграция с 3v4l.org, повысилась производительность, улучшился новый пользовательский интерфейс, появился отладчик DFA для PHP и многое другое.

### [PHP Foundation Update, March 2023](https://thephp.foundation/blog/2023/03/31/php-foundation-update-march-2023/)

Команда PHP Foundation объявила о возможности поддержки PHP с помощью программы GitHub Sponsors и раскрыла новую инициативу Консультативного совета.

### [Объявлены релиз-менеджеры PHP 8.3](https://wiki.php.net/todo/php83)

По традиции, у PHP 8.3 будет два новичка-релиз-менеджера: [Jakub Zelenka](https://github.com/bukka), разработчик ядра PHP, поддерживаемый [PHP Foundation](https://thephp.foundation/) и [Eric Mann](https://github.com/ericmann). Им будет помогать ветеран-релиз-менеджер PHP 8.2 [Pierrick Charron](https://github.com/adoy).

## PHP Core

Большинство новостей ядра PHP подробно освещаются в
серии [PHP Core Roundup](https://thephp.foundation/blog/tag/roundup/) от PHP Foundation, мы лишь быстро по ним
пробежимся:

### ✅ [RFC: Arbitrary static variable initializers](https://wiki.php.net/rfc/arbitrary_static_variable_initializers)

PHP позволяет объявлять статические переменные внутри любых функций. Их значения выходят за пределы вызова функции и разделяются между будущими выполнениями функции.

В PHP 8.3 вы можете присвоить им любое выражение, например, результат другой функции.

```php
function bar() {    
    echo "вызвана функция bar()\n";
    return 1;
}
 
function foo() {
    static $i = bar();  // В настоящее время это приводит к фатальной ошибке, но будет работать в PHP 8.3
    echo $i++, "\n";
}
 
foo();
// вызвана функция bar()
// 1
foo();
// 2
foo();
// 3
```

В качестве побочного эффекта, в PHP 8.3 будет запрещено повторное объявление статических переменных. Это исправит некоторые причуды PHP, которые вы, надеюсь, никогда не видели в реальном коде:

```php
function f()
{
  static $x = 1;
  return $x;
  static $x = 2;
}
echo f();
```

Если вы ожидали, что второе статическое объявление окажется недоступным, то, к сожалению, ошиблись: [https://3v4l.org/HhpYj](https://3v4l.org/HhpYj).

### 📣 [RFC: Clone with](https://wiki.php.net/rfc/clone_with)

Máté Kocsis предложил добавить поддержку новой языковой конструкции `clone with`, расширив оператор `clone`, что позволит писать «wither» методы для любого типа свойств экземпляра (объявленные/динамические, типизированные/нетипизированные, readonly/не-readonly) с меньшим количеством кода.

```php
class Response implements ResponseInterface {
    public readonly int $statusCode;
    
    public readonly string $reasonPhrase;
    // ...
    public function withStatus($code, $reasonPhrase = ''): Response
    {
        return clone $this with {
            statusCode: $code,
            reasonPhrase: $reasonPhrase
        };
    }
    // ...
}

$response = new Response(200);
$response->withStatus(201)->withStatus(202);
```

### 📣 [RFC: New core autoloading mechanism with support for function autoloading](https://wiki.php.net/rfc/core-autoloading)

George Peter Banyard и Dan Ackroyd предлагают более продуманный механизм автозагрузки классов и добавляют новый механизм автозагрузки функций.

### 📣 [Jakub Zelenka предлагает сформировать Технический комитет PHP](https://wiki.php.net/rfc/php_technical_committee)

В PHP используется голосование RFC для принятия решений о видимых пользователю изменениях языка, которое хорошо работает, несмотря на некоторые известные проблемы. Однако оно не так эффективно для технических изменений, которые влияют на внутреннее устройство PHP и API модулей, а конфликты между разработчиками по техническим вопросам не так легко разрешить.

Предлагаемый комитет будет состоять из 5 избранных членов, и если возникнет спор или вопрос по поводу изменения, комитет может быть призван решить его.

## Инструменты

- [crazywhalecc/static-php-cli](https://github.com/crazywhalecc/static-php-cli/blob/refactor/README-en.md) – Инструмент для сборки PHP-приложений в один бинарный файл без лишних зависимостей.

- [aschmelyun/subvert](https://github.com/aschmelyun/subvert) – Создание субтитров, аннотаций и глав из видео за считанные секунды.

- [Crell/EnvMapper](https://github.com/Crell/EnvMapper) – Легко отображайте переменные окружения в определенные классифицированные объекты, готовые к внедрению зависимостей.

- [yiisoft/db](https://github.com/yiisoft/db) – Конструктор запросов для различных типов баз данных (MariaDB, MSSQL, MySQL, Oracle, PostgreSQL и SQLite), не зависящий от фреймворка.

- 🚧 NativePHP – Marcel Pociot создаёт инструмент для запуска приложений Laravel/PHP на десктопе поверх [Electron](https://www.electronjs.org/) или [Tauri](https://tauri.app/).

## Laravel

- [Вышел Valet 4.0](https://laravel-news.com/valet-v4-is-released)

Несмотря на название, Laravel Valet – это минималистичная среда разработки для macOS, которую можно использовать для любого PHP-проекта.
В этом выпуске в основном переписываются внутренние компоненты, чтобы их было легче отлаживать, исправлять и модифицировать. Также появилась новая команда `valet status` и поддержка [Expose](https://expose.dev/) в качестве опции совместного использования.

- [Вышел Laravel IDEA 7.0](https://plugins.jetbrains.com/plugin/13441-laravel-idea)

Большое обновление популярного плагина для PhpStorm. Оно включает в себя пользовательский интерфейс "New Eloquent Model" и поддержку шаблонов Twig.

- 🎬 [Обзор Spatie route attributes](https://youtu.be/Mw6AL3RYX8A)

- 🎬 [Обзор пакета Fortify для Laravel](https://youtu.be/CoTPZeyqBQM)

## Статьи

- [Как и зачем тестировать код на бэкенде: рекомендации для новичков](https://habr.com/ru/company/avito/blog/721434/)
- [Апгрейд и рефакторинг PHP-проектов — теперь это просто с Rector](https://habr.com/ru/company/oleg-bunin/blog/720216/)
- [Как разминировать свой код на PHP (и не только)?](https://habr.com/ru/company/oleg-bunin/blog/708112/)
- [«Давайте перепишем всё с нуля». Почему такой подход интереснее программистам, а не бизнесу](https://habr.com/ru/post/722080/)
- [Компилируем быстрые консольные .exe приложения на PHP 8.1 в 2023 году, а почему бы и нет?](https://habr.com/ru/company/timeweb/blog/721504/)
- [Проектируем реактивное — Message-Driven системы на PHP](https://habr.com/ru/company/otus/blog/720758/)
- [ЦУЦ — или как свести 15 тысяч товаров от разных поставщиков на коленке](https://habr.com/ru/post/723910/)
- [Я пробовал GitHub Copilot, и я в восторге](https://habr.com/ru/company/otus/blog/725044/)

## Видео

- [PHP-линч #10](https://www.youtube.com/live/B-jLIJDsRIY?feature=share)
- [PHP-линч #11](https://youtu.be/f7xsThRxG20)
- [PHP-линч #12](https://www.youtube.com/live/vjurYdvZ4lw?feature=share)
