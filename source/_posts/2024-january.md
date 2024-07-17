---
title: Январь 2024
author:
  - sergey
  - roman
date: 2024-01-25
year: 2024
external:
  - telegram: https://t.me/phpdigest
  - phpannotated: https://blog.jetbrains.com/phpstorm/2024/01/php-annotated-january-2024/
  - cutcode: https://youtu.be/a5kmr-OlpME
---

Подборка свежих новостей, инструментов, видео и материалов из мира PHP.

Приятного чтения!

## Новости

### Вышли [PHP 8.2.15](https://www.php.net/ChangeLog-8.php#8.2.15) и [PHP 8.3.2](https://www.php.net/ChangeLog-8.php#8.3.2)

🐛 Выпуски с исправлениями ошибок вышли по расписанию.

### [The PHP Foundation Team Update 2024](https://thephp.foundation/blog/2024/01/03/the-php-foundation-team-update-2024/)

В этом году к PHP Foundation присоединятся еще четыре разработчика для дальнейшего развития
PHP: [David Carlier](https://github.com/devnexen),
[James Titcumb](https://github.com/asgrim), [Saki Takamachi](https://github.com/SakiTakamachi)
и [Shivam Mathur](https://github.com/shivammathur).

Поприветствуем новых членов команды и пожелаем им больших достижений.

### [Рейтинг TIOBE](https://www.tiobe.com/tiobe-index/)

Компания TIOBE Software опубликовала январский рейтинг популярности языков программирования, в котором по сравнению с
январем 2023 года JavaScript переместился с 7 на 6 место, PHP – с 10 на 7,
Scratch – с 20 на 10, Go – с 12 на 11, Fortran – с 27 на 12, Kotlin - с 25 на 17, а Cobol – с 31 на 20.
Языком года был назван C#, который сохранил за собой 5-е место, но стал лидером по приросту (+1,43 %).

![](/assets/images/post/2024-january/tiobe.png)

### Открыта программа раннего доступа [PhpStorm PhpStorm 2024.1](https://blog.jetbrains.com/phpstorm/2024/01/phpstorm-2024-1-early-access-program-is-now-open/)

С помощью программы раннего доступа вы можете попробовать новые возможности PhpStorm и оставить свой отзыв команде
PhpStorm. Сборки EAP бесплатны для использования и не требуют лицензии.

В этой сборке реализована поддержка PHPUnit 11, улучшена работа с фреймворком для тестирования Pest, улучшены функции
анализа кода, а также внесено множество других улучшений.

## PHP Core

Большинство новостей ядра PHP подробно освещаются в
серии [PHP Core Roundup](https://thephp.foundation/blog/tag/roundup/) от PHP Foundation, мы лишь быстро по ним
пробежимся:

### 📣 [RFC: Opt-in DOM spec-compliance](https://wiki.php.net/rfc/opt_in_dom_spec_compliance)

Модуль DOM изначально соответствовал спецификации [DOM Core Level 3](https://www.w3.org/TR/DOM-Level-3-Core/),
но не может поддерживать «[Живую спецификацию](https://dom.spec.whatwg.org/)» из-за множества ошибок.

Это приводит к тому, что люди пытаются обойти эти ошибки, полагаясь на ещё большие ошибки или на недокументированные
побочные эффекты, что в итоге приводит к ещё большим проблемам. И эти ошибки не ограничиваются только HTML, они также
распространяются на XML-документы.

[HTML 5 RFC](https://wiki.php.net/rfc/domdocument_html5_parser) уже одобрен для PHP 8.4. Теперь Niels Dossche предлагает
построить на его основе «Живую спецификацию», сохранив старую для обратной совместимости.

### 📣 [Dedicated StreamBucket class](https://wiki.php.net/rfc/dedicated_stream_bucket)

Сейчас нет отдельного класса для работы с бакетами потока и используется `stdClass`.

Máté Kocsis предлагает добавить новый окончательный класс `StreamBucket` для облегчения статического анализа и улучшения
обратной связи.

### 📣 [RFC: Multibyte for ucfirst, lcfirst functions, mb_ucfirst mb_lcfirst](https://wiki.php.net/rfc/mb_ucfirst)

Yuya Hamada предлагает добавить многобайтовую поддержку для функций `ucfirst` и `lcfirst`; по аналогии, в PHP 8.4 уже
будет доступна многобайтовая поддержка для функций `trim`, `ltrim` и `rtrim`.

### 📣 [RFC: Raising zero to the power of negative number](https://wiki.php.net/rfc/raising_zero_to_power_of_negative_number)

Сейчас возведение в отрицательную степень нуля возвращает `float(INF)`.
Jorg Sowa предлагает PHP 8.4 выдавать предупреждение об устаревании, а начиная с PHP 9.0 – выбрасывать исключение.

### 📣 [RFC: Deprecate implicitly nullable parameter types](https://wiki.php.net/rfc/deprecate-implicitly-nullable-types)

В настоящее время использование `null` в качестве значения по умолчанию для параметра функции разрешено и не приводит к
ошибке, даже если тип параметра и не является `nullable`.

Более того, существует небольшое несоответствие в разрешении необязательных параметров перед обязательными. Например,
следующая сигнатура является допустимой:

```php
function foo(T1 $a, T2 $b = null, T3 $c) {}
```

Máté Kocsis и Gina Peter Banyard предлагают отказаться от таких объявлений и требовать явных пометок `nullable`.
Это изменение, ломающее обратную совместимость, но переход довольно прост и может быть автоматизирован.

```php
function foo(T $var = null) {} // Ошибка уровня E_WARNING, если RFC будет принят
function foo(?T $var = null) {} // Всё в порядке
```

### ✅ [RFC: Improve callbacks in ext/dom and ext/xsl](https://wiki.php.net/rfc/improve_callbacks_dom_and_xsl)

Методы `XSLTProcessor::registerPHPFunctions()` и `DOMXPath::registerPhpFunctions()` смогут использовать тип `callable` в
PHP 8.4.

### ✅ [RFC: Resource to object conversion](https://wiki.php.net/rfc/resource_to_object_conversion)

В PHP ведётся долгосрочная работа по переводу всех ресурсов в объекты.
RFC предложил план, как осуществить этот переход.

Вторичное голосование определило, что ресурсы основного потока (поток, постоянный поток), вспомогательные ресурсы
потока (контексты, фильтры, бригады, бакеты) и ресурс `Process` будут преобразованы в PHP 9.0.

Остальные ресурсы будут постепенно преобразованы в PHP 8.4 или другой минорной версии,
так изменение обратной совместимости будет незначительным.

### 📊 [RFC: Promote the PHP Foundation](https://wiki.php.net/rfc/promote_php_foundation)

Нетехнический RFC, возникший из обсуждения PR в репозитории [php/web-php](https://github.com/php/web-php/pull/821),
стоит ли продвигать PHP Foundation на сайте php.net.

### 📊 [RFC: Final by default anonymous classes](https://wiki.php.net/rfc/final_by_default_anonymous_classes)

Daniil Gentili предлагает сделать все анонимные классы окончательными по умолчанию и предоставить новое ключевое слово
open, чтобы при необходимости сделать их неокончательными. Это похоже на `new open class {}` в Kotlin.

### 📊 [RFC: Policy Repository](https://wiki.php.net/rfc/policy-repository)

RFC был принят единогласно, политики будут храниться в репозитории [php/policies](https://github.com/php/policies).

### 📊 [RFC: RFC1867 for non-POST HTTP verbs](https://wiki.php.net/rfc/rfc1867-non-post)

RFC1867 определяет тип контента `multipart/form-data`. PHP поддерживает анализ этого типа контента, но только для
POST-запросов. Если осуществляется POST-запрос и тип содержимого `multipart/form-data`, тело запроса немедленно
обрабатывается перед запуском PHP-скрипта и заполняется в суперглобальные переменные `$_POST` и `$_FILES`. Эта функция
запускается автоматически и не предоставляется непосредственно пользователю.

Ilija Tovilo предлагает добавить новую функцию `request_parse_body()`, чтобы вывести существующую функциональность на
пользовательский уровень и использовать её для других HTTP-методов, например, `PUT` и `PATCH`.

### 🎉 [Новый PECL появится в 2024 году](https://twitter.com/ThePHPF/status/1732082795831337402)

PHP Foundation собирается пересмотреть способ установки модулей в PHP.

Сейчас модули распространяются с помощью устаревшего сайта pecl.php.net и инструмента `pecl`. Цель состоит в том, чтобы
предоставить современную альтернативу, которая будет проще в использовании как для пользователей, так и для
разработчиков модулей.

## Инструменты

- [@php-wasm/cli](https://www.npmjs.com/package/@php-wasm/cli) – Запуск PHP с WASM в терминале!

```
npx @php-wasm/cli -r 'echo "Привет, мир!";'
```

Спасибо команде WordPress за продвижение этой идеи!

На случай, если вы пропустили, есть также локальная среда разработки на основе WASM для
PHP [wp-now](https://github.com/WordPress/playground-tools/tree/trunk/packages/wp-now/#readme).

- Вышел [nikic/PHP-Parser](https://github.com/nikic/PHP-Parser/releases/tag/v5.0.0)
  5.0.0 – [Список изменений](https://github.com/nikic/PHP-Parser/releases/tag/v5.0.0) впечатляет.

- [spatie/holidays](https://github.com/spatie/holidays) – Пакет для расчёта дней, когда вам не нужно
  работать! [Проверьте](https://freek.dev/2641-a-mini-package-to-calculate-public-holidays-in-a-country), как это
  работает.

- [spatie/tabular-assertions](https://github.com/spatie/tabular-assertions) – Позволяет создавать табличные утверждения
  с помощью Pest или PHPUnit.

- [denzyldick/phanalist](https://github.com/denzyldick/phanalist) – Наглядный и быстрый статический анализатор для PHP,
  созданный на Rust. Он довольно мал по сравнению с PHPStan или Psalm, но хорош для того, чтобы иметь возможность
  [написать свой собственный статический анализатор для PHP](https://dev.to/denzyldick/the-beginning-of-my-php-static-analyzer-in-rust-5bp8)
  на Rust.

- [simonhamp/the-og](https://github.com/simonhamp/the-og) – Генератор изображений OpenGraph на чистом PHP.

- [doekenorg/decorate-php](https://github.com/doekenorg/decorate-php) – Создание PHP-декоратора или прокси на основе
  интерфейса или (абстрактного) класса.

- [owasp-dep-scan/dep-scan](https://github.com/owasp-dep-scan/dep-scan) – Инструмент аудита безопасности и рисков нового
  поколения от OWASP, основанный на известных уязвимостях, рекомендациях и лицензионных ограничениях для зависимых
  проектов.

  В посте [DepScan ❤️ PHP](https://www.linkedin.com/pulse/depscan-php-prabhu-subramanian-jkp3e/) были анонсированы `cdxgen` и `depscan` 5.2.0 с поддержкой точного анализа достижимости для
  PHP-приложений, библиотек и плагинов WordPress.

- [valorin/random](https://github.com/valorin/random) – Простой пакет-помощник, предназначенный для упрощения генерации
  различных криптографически безопасных случайных значений.

- [theodo-group/LLPhant](https://github.com/theodo-group/llphant) – Комплексный PHP Generative AI Framework,
  использующий OpenAI GPT 4. Вдохновлён Langchain и LLamaIndex.

- [julien-boudry/Condorcet](https://github.com/julien-boudry/Condorcet) – Приложение командной строки и библиотека PHP,
  предоставляющая механизм выборов с высокоуровневым интерфейсом. Встроенная поддержка 20+ методов голосования, легко
  расширяемая. Поддержка простых выборов или миллиардов голосов в условиях низких ресурсов.

- [archtechx/enums](https://github.com/archtechx/enums) – Помощники, позволяющие сделать перечисления PHP ещё лучше.

- [JustSteveKing/php-sdk](https://github.com/JustSteveKing/php-sdk) – Базовая библиотека для ваших PHP SDK.

- [danog/php-tokio](https://github.com/danog/php-tokio?tab=readme-ov-file) – Использование асинхронных библиотек Rust в
  PHP.

- [joanhey/AdapterMan](https://github.com/joanhey/AdapterMan) – Запустите практически любое PHP-приложение асинхронно с
  помощью [walkor/workerman](https://github.com/walkor/workerman), не меняя фреймворк или приложение.

  ![](/assets/images/post/2024-january/adapterman.png)

## Symfony

- [Использование Symfony / PHP](https://habr.com/ru/articles/784660/)
- [Использование Symfony / PHP (II)](https://habr.com/ru/articles/785008/)
- [По локоть в легаси: пошагово перезапускаем устаревший портал на PHP](https://habr.com/ru/articles/787958/)

## Laravel

- [Headless eCommerce на Laravel: Погружение в модульную архитектуру](https://habr.com/ru/articles/787062/)
- [Изучение мидлварей в Laravel 11](https://habr.com/ru/articles/785026/)
- [Профайлинг Laravel приложений с XDebug и PHPStorm](https://habr.com/ru/articles/788946/)
- 🎬 [Laravel 11 под капотом. Что нового?](https://youtu.be/R3CB3ctuz3k)
- [stevebauman/autodoc-facades](https://github.com/stevebauman/autodoc-facades) – Пакет для автоматической генерации PHP
  doc-аннотаций для фасадов Laravel.
- [spatie/laravel-pdf](https://github.com/spatie/laravel-pdf) – Пакет для создания PDF-файлов в приложениях Laravel.
- [spatie/laravel-export](https://github.com/spatie/laravel-export) – Создание пакета статических сайтов из приложения
  Laravel.
- [tighten/ziggy](https://github.com/tighten/ziggy) – Используйте маршруты Laravel в JavaScript.
- [defstudio/telegraph](https://github.com/defstudio/telegraph?tab=readme-ov-file) – Пакет Laravel для удобного
  взаимодействия с ботами Telegram.
- [nWidart/laravel-modules](https://github.com/nWidart/laravel-modules?tab=readme-ov-file) – Управление модулями для
  Laravel.

## Статьи

- [Как защититься от «бестелесных» веб-шеллов](https://habr.com/ru/companies/cyberok/articles/787320/)
- [Защита JPG-файлов от копирования с помощью Exif и IPTC-тегов](https://habr.com/ru/articles/786412/)
- [MemSess — очередной сервер для работы с сессиями](https://habr.com/ru/articles/786398/)
- [Разборка в Шторме](https://habr.com/ru/articles/784256/)
- [Сравнение эффективности 20 языков программирования](https://www.opennet.ru/opennews/art.shtml?num=60384)
- [Построитель SQL запросов на основе мета-информации миграций БД](https://habr.com/ru/articles/788098/)

## Видео

- [Обзор Laravel Octane, Roadrunner, FrankenPHP](https://youtu.be/DgVLt7j8Nxo) 