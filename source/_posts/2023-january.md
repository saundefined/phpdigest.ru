---
title: Январь 2023
author:
  - sergey
  - roman
date: 2023-01-19
year: 2023
external:
  - telegram: https://t.me/phpdigest
  - phpannotated: https://blog.jetbrains.com/phpstorm/2023/01/php-annotated-january-2023/
  - cutcode: https://youtu.be/vnkX44AX-lM
---

Подборка свежих новостей, инструментов, видео и материалов из мира PHP.

Приятного чтения!

## Новости

### Вышли [PHP 8.0.27](https://www.php.net/archive/2023.php#2023-01-05-3), [PHP 8.1.14](https://www.php.net/archive/2023.php#2023-01-05-1) и [PHP 8.2.1](https://www.php.net/archive/2023.php#2023-01-05-2)

❗ Это выпуски исправлений безопасности.

### [What’s Next in PhpStorm: The 2023.1 Public Roadmap](https://blog.jetbrains.com/phpstorm/2023/01/what-s-next-in-phpstorm-the-2023-1-public-roadmap/)

В первом выпуске 2023 года команда JetBrains стремится повысить производительность и ускорить индексирование, добавить
интеграцию с 3v4l.org, улучшить поддержку дженериков, а также тегов PHPStan и Psalm.

## PHP Core

Большинство новостей ядра PHP подробно освещаются в
серии [PHP Core Roundup](https://thephp.foundation/blog/tag/roundup/) от PHP Foundation, мы лишь быстро по ним
пробежимся:

### ✅ [RFC: Dynamic class constant fetch](https://wiki.php.net/rfc/dynamic_class_constant_fetch)

В PHP 8.3 появится синтаксис для поиска констант классов:

```php
class Foo {
    const BAR = 'bar';
}
$bar = 'BAR';
// Новый синтаксис в PHP 8.3:
echo Foo::{$bar};
```

### ✅ [RFC: More Appropriate Date/Time Exceptions](https://wiki.php.net/rfc/datetime-exceptions)

Начиная с версии PHP 8.3, при использовании классов Date/Time, PHP будет выбрасывать более специфические исключения,
если что-то пойдет не так.

Процедурный стиль функций Date/Time не затрагивается и будет продолжать использовать предупреждения и ошибки, как и
сейчас.

### 📊 [RFC: Asymmetric Visibility](https://wiki.php.net/rfc/asymmetric-visibility)

Ilija Tovilo и Larry Garfield предложили добавить Swift-подобный синтаксис, позволяющий свойствам иметь отдельную ("
асимметричную") видимость для операций чтения и записи.

```php
class Foo {
    public private(set) string $bar;
}
```

В настоящее время голосование проходит медленно и функция не набирает достаточного количества голосов, чтобы достичь
порога в 2/3.

### 📣 [RFC: Add SameSite cookie attribute parameter](https://wiki.php.net/rfc/same-site-parameter)

George Peter Banyard предлагает добавить параметр `SameSite` во все соответствующие функции.

### Набор из 18 функций/изменений для улучшения ядра PHP

Thomas Hruska реализовал [cubiclesoft/php-ext-qolfuncs](https://github.com/cubiclesoft/php-ext-qolfuncs) - набор функций
улучшения качества жизни, предназначенных для ядра PHP.

В наборе есть несколько довольно интересных
дополнений: `str_splice()`, `str_realloc()`, `fread_mem()`, `is_reference()`, `refcount()` и это только некоторые из
них. С нетерпением ждём появления официального RFC.

## Инструменты

- [amphp/amp](https://github.com/amphp/amp) 3.0.0 – Неблокирующий параллельный фреймворк для PHP-приложений получил
  крупное обновление. Теперь он основан на корутинах, использующих файберы вместо генераторов, а также
  использует [revoltphp/event-loop](https://github.com/revoltphp/event-loop).

  Также были обновлены многочисленные пакеты экосистемы Amphp; вот лишь несколько примеров: [amphp/pipeline](https://github.com/amphp/pipeline) и [amphp/process](https://github.com/amphp/process).

- [PHP-DI 7.0](https://github.com/PHP-DI/PHP-DI/releases/tag/7.0.0) – В этом обновлении пакета контейнера инъекции
  зависимостей добавлена поддержка PHP 8.0+, PHPDoc-аннотация `@Inject` заменена атрибутом `#[Inject]`, добавлена
  совместимость с PSR-11 2.0 и другие улучшения.

- [php-ffi/var-dumper](https://github.com/php-ffi/var-dumper) – Обёртка
  для [symfony/var-dumper](https://github.com/symfony/var-dumper), позволяющая сбрасывать типы FFI с помощью
  функций `dd()` и `dump()`.

- [olvlvl/composer-attribute-collector](https://github.com/olvlvl/composer-attribute-collector/) – Удобный и практически
  незатратный способ получения целей атрибутов PHP 8.

- [PHPCSStandards/PHPCSExtra](https://github.com/PHPCSStandards/PHPCSExtra#sniffs) – Коллекция дополнительных правил для
  использования с PHP_CodeSniffer.

- [cerbero90/enum](https://github.com/cerbero90/enum) – PHP-пакет для расширения функциональности перечислений. По сути,
  это трейт, который вы можете добавить к своим перечислениям, чтобы наделить их множеством полезных функций.

- [NoiseByNorthwest/php-spx](https://github.com/NoiseByNorthwest/php-spx) – Простой и понятный модуль для профилирования
  PHP со встроенным веб-интерфейсом.

- [PXP](https://pxplang.org/) – Супернабор PHP с расширенными возможностями синтаксиса и времени выполнения.

  [Ryan Chandler](https://twitter.com/ryangjchandler) начал с
  разработки [парсера PHP на языке Rust](https://github.com/php-rust-tools/parser). Проект перерос в целую идею
  супернабора языков.

  Ранее уже было несколько попыток создать такой суперсет для
  PHP ([marcioAlmada/yay](https://github.com/marcioAlmada/yay)
  или [nunomaduro/plus-1](https://github.com/nunomaduro/plus-1)), но этот выглядит довольно многообещающе.

  По всей видимости, существует ещё одна подобная попытка, также разработанная на
  Rust: [Ara Programming Language](https://github.com/ara-lang) - статически типизированный язык программирования,
  который компилируется непосредственно в PHP.

## Статьи

- [Вышел PHP 8.2: разбираем главные изменения](https://habr.com/ru/company/hexlet/blog/705194/)
  Александр Макаров, Валентин Удальцов и Владлен Гилязетдинов разбираются, какие новые фичи появились в PHP 8.2,
  насколько эти изменения глобальны и какую роль в них сыграл проект РHP Foundation.

- [Откуда что берется: интеграция с ЕСИА на языке PHP](https://habr.com/ru/company/ubrr/blog/703466/)
- [Как мы интегрировали и настроили для работы Conventional Commits в PHPStorm](https://habr.com/ru/post/706772/)
- [Честные модули внутри PHP: теперь они существуют](https://habr.com/ru/company/vk/blog/705998/)
  и [запись доклада](https://youtu.be/X_T3UgFUsw4) с HighLoad++
- [Популяризация JSON-RPC (часть 1)](https://habr.com/ru/post/709362/)
- [Работа с Веб-сокетами на PHP](https://habr.com/ru/post/709448/)
- [В очередь, ...! Как управлять состоянием системы через события](https://habr.com/ru/post/699492/)
- [Зачем и как использовать Объекты передачи данных в Laravel](https://laravel.demiart.ru/data-transfer-objects-in-laravel-why-and-how/)

## Видео

- [ID-баттл: UUID vs автоинкремент](https://youtu.be/Xr_SNd9LIng)
- [Docker for PHP developer: tips and tricks](https://youtu.be/6ZwLi3vKbcw)
- [PHP: почему его вечно хоронят, актуально ли его учить и чем он полезен бизнесу](https://youtu.be/vSCV3wNVOH0)
