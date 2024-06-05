---
title: Февраль-Март 2024
author:
  - sergey
  - roman
date: 2024-03-12
external:
  - telegram: https://t.me/phpdigest
  - phpannotated: https://blog.jetbrains.com/phpstorm/2024/03/php-annotated-february-march-2024/
  - cutcode: https://youtu.be/0v-PrRM4Xfg
---

Подборка свежих новостей, инструментов, видео и материалов из мира PHP.

Приятного чтения!

## Новости

### Вышли [PHP 8.2.16](https://www.php.net/ChangeLog-8.php#8.2.16) и [PHP 8.3.3](https://www.php.net/ChangeLog-8.php#8.3.3)

🐛 Выпуски с исправлениями ошибок вышли по расписанию.

### ❗️ [Вышел Composer 2.7](https://blog.packagist.com/composer-2-7-and-cve-2024-24821/)

В Composer исправлена уязвимость [CVE-2024-24821](https://nvd.nist.gov/vuln/detail/CVE-2024-24821),
при определённых условиях выполнение произвольного кода может привести к локальному повышению привилегий пользователя,
обеспечить горизонтальное перемещение или выполнение вредоносного кода.

### [Итоги ежегодного опроса PHP-сообщества](https://phpcommunity.ru/2023-php)

Опубликованы результаты за 2023 год. По итогам получился срез данных: на каких версиях PHP сидят в командах, какой
фреймворк выбирают для рабочих проектов, а какой для личных, как относятся к ИИ-инструментам для разработки, кого
считают человеком года и многие другие аспекты. Опрос помогают составлять и распространять ребята, которые развивают
городские и региональные PHP-сообщества, а также руководят каналами и подкастами про PHP.

Ознакомьтесь также с результатами за [2022](https://phpcommunity.ru/2022-php), [2021](https://phpcommunity.ru/2021-php)
и [2020](https://phpcommunity.ru/never-forget-2020) годы.

### [Вышли Doctrine ORM 3 и DBAL 4](https://www.doctrine-project.org/2024/02/03/doctrine-orm-3-and-dbal-4-released.html)

Релизы, которые делают инструменты более тонкими и эффективными, являются кульминацией более чем десятилетней
напряжённой работы десятков участников и сопровождающих Doctrine.

### [Вышел Rector 1.0](https://getrector.com/blog/rector-1-0-is-here/)

Первый стабильный выпуск инструмента для автоматического обновления и рефакторинга включает в себя новую конфигурацию
Zen, новую команду custom-rule, автоматизированные наборы PHP и упрощённую интеграцию с новыми проектами.

### [Статистика версий PHP: Январь 2024](https://stitcher.io/blog/php-version-stats-january-2024)

Регулярный обзор использования различных версий PHP основан на данных,
которые [клиенты отправляют на сайт packagist.org](http://packagist.org/) (например, при выполнении
команды `composer update`).

Вот, вкратце, как изменилось распределение использования за последние шесть месяцев:

- PHP 7.* – 20.3% (29.7% в 2023)
- PHP 8.* – 78.2% (69% в 2023)

### [Вышел PHPUnit 11](https://phpunit.de/announcements/phpunit-11.html)

В этой версии атрибуты PHP 8 теперь используются вместо аннотаций PHPDoc и прекращено использование менее необходимых
функций.

## PHP Core

Большинство новостей ядра PHP подробно освещаются в
серии [PHP Core Roundup](https://thephp.foundation/blog/tag/roundup/) от PHP Foundation, мы лишь быстро по ним
пробежимся:

### [Релиз-менеджеры PHP 8.4](https://externals.io/message/122569)

PHP ищет трёх инженеров для работы над выпуском грядущей ветки PHP 8.4. Кандидаты должны взять на себя обязательства на
срок 3,5 года и обладать хорошими знаниями PHP, Git и C.

Заявки принимаются до 31 марта.

### [PHP Foundation: Отчёт о прозрачности за 2023 год](https://thephp.foundation/blog/2024/02/26/transparency-and-impact-report-2023/)

Сейчас фонд спонсирует 10 инженеров для работы над ядром и инфраструктурой PHP, получает спонсорскую помощь от крупных
PHP-компаний и получил инвестиции от фонда, поддерживаемого правительством Германии.

На 2024 год группа фонда запланировала несколько значительных проектов, включая новый инструмент для установки
модулей PHP, аудит безопасности и обновление документации.

Роман Пронский – операционный менеджер фонда, спонсируемый JetBrains.
Посмотрите его доклад на Laracon EU, чтобы узнать больше о фонде:

<iframe width="560" height="315" src="https://www.youtube.com/embed/XE4g1Tl6RQw?si=w9PJrxKVlel7FdY9" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

### [Добро пожаловать в обсуждения PHP Foundation!](https://github.com/orgs/ThePHPF/discussions/4)

PHP Foundation запустил экспериментальные обсуждения как прямой ответ на запрос сообщества о более открытой и доступной
платформе для общения.

Вы можете делиться мыслями и идеями без технической реализации, в отличие от технических списков рассылок PHP. Идеи
также могут быть не связаны напрямую с исходным кодом.

Не стесняйтесь обращаться к руководству фонда или разработчикам.

### 📣 [RFC: Property hooks](https://wiki.php.net/rfc/property-hooks)

Хуки стали одним из самых больших и обсуждаемых RFC в PHP за последние несколько лет. После обсуждения авторы
предложения, Larry Garfield и Ilija Tovillo, существенно обновили детали.

Некоторые заметные изменения:

- Как было отмечено некоторое время назад, `$field` было удалено.
- Сокращение `$foo =>` выражение было удалено. Теперь допустимыми сокращениями являются:

```php
public string $foo {
  get => оценивается в значение;
  set => присваивает это значение;
}
```

- Сокращение set (с `=>`) теперь означает «записать это значение вместо». Версия без сокращения (`set { }`) всегда
  возвращает `void`, поэтому вам придётся присваивать значение самостоятельно.
- Добавлен FAQ о подходе, ориентированном на свойства, а не на методы.
- Добавлен пункт FAQ, объясняющий, почему ключевое слово «virtual» не может быть использовано.

### 📣 [RFC: Add OOP methods to Curl objects](https://wiki.php.net/rfc/curl-oop)

Сейчас объекты cURL по-прежнему являются непрозрачными типами для хранения и управления базовыми типами libcurl и не
предлагают никаких API для использования авторами скриптов.

Sara Golemon предлагает добавить ООП-интерфейсы в модуль cURL и четыре новых исключения.

```php
try {
    (new \CurlHandle)->setOpt(YOUR_VOTE, true)->exec();
} catch (\CurlHandleException $ex) {
    assert(false);
}
```

### 📊 [RFC: Deprecate implicitly nullable parameter types](https://wiki.php.net/rfc/deprecate-implicitly-nullable-types)

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

### ❌ [RFC: Final by default anonymous classes](https://wiki.php.net/rfc/final_by_default_anonymous_classes)

### ✅ [RFC: RFC1867 for non-POST HTTP verbs](https://wiki.php.net/rfc/rfc1867-non-post)

В PHP 8.4 появится новая функция `request_parse_body()`, чтобы вывести существующую функциональность на
пользовательский уровень и использовать её для других HTTP-методов, например, `PUT` и `PATCH`.

### ✅ [RFC: Add http_(get|clear)_last_response_headers() function](https://wiki.php.net/rfc/http-last-response-headers)

В PHP 8.4 появятся две новые функции: `http_get_last_response_header()`, которая будет выводить ту
же информацию, что и переменная `$http_response_header`, и `http_clear_last_response_header()` для очистки последних
заголовков.

### ✅ [RFC: Multibyte for ucfirst, lcfirst functions, mb_ucfirst mb_lcfirst](https://wiki.php.net/rfc/mb_ucfirst)

В PHP 8.3 появятся новые функции: `mb_ucfirst` и `mb_lcfirst`.

## Инструменты

- [php-static-analysis/attributes](https://github.com/php-static-analysis/attributes) – Атрибуты, используемые для
  статического анализа.

  Идея, появившаяся в одном из [обсуждений в Twitter](https://twitter.com/pronskiy/status/1743338836510343609), теперь
  получила достойную реализацию, позволяя указывать метаданные типов для функций и классов в атрибутах PHP 8 вместо
  тегов PHPDoc.

  ![](/assets/images/post/2024-february-march/attributes.jpg)

- [typhoon-php/typhoon](https://github.com/typhoon-php/typhoon) – Бескомпромиссная статическая рефлексия для PHP с
  поддержкой phpDoc-типов и резолвингом
  дженериков.

- [xepozz/internal-mocker](https://github.com/xepozz/internal-mocker/) – Инструмент для моков внутренних функций и
  классов PHP.

- [coollabsio/coolify](https://github.com/coollabsio/coolify?tab=readme-ov-file) – Альтернатива Heroku, Netlify и Vercel
  с открытым исходным кодом и возможностью самостоятельного хостинга.

- [opencodeco/phpctl](https://github.com/opencodeco/phpctl) – Среда разработки для PHP на основе Docker (контейнеров).

- [hydephp/hyde](https://github.com/hydephp/hyde) – Генератор статических сайтов, использующий мощь Laravel и простоту
  Markdown.

- [swoole/phpy](https://github.com/swoole/phpy) – Библиотека, позволяющая использовать функции и библиотеки Python в PHP
  или использовать пакеты PHP в Python.

- [SRWieZ/thumbhash](https://github.com/SRWieZ/thumbhash) – Реализация ThumbHash в PHP, позволяющая генерировать
  уникальные, человекочитаемые идентификаторы из файлов изображений.

- [rryqszq4/ngx-php](https://github.com/rryqszq4/ngx-php) – Встроенный модуль языка PHP для веб-сервера NGINX. Согласно
  тестам, на данный момент это самый быстрый способ запуска PHP – быстрее, чем Swoole, RoadRunner и FrankenPHP.

- [crazywhalecc/static-php-cli](https://github.com/crazywhalecc/static-php-cli) – Этот инструмент позволяет создавать
  автономные исполняемые файлы PHP для Linux, macOS, ~~~~FreeBSD, а с последним обновлением – и для Windows!

## Symfony

- [Logstash, Manticore, Nginx и Symfony: сбор, агрегация и быстрый поиск логов](https://habr.com/ru/articles/790874/)
- [Как ошибки проектирования при разработке на Symfony могут привести к перерасходу ресурсов и замедлению работы системы](https://habr.com/ru/articles/794805/)

## Laravel

- [Laravel трюки: автоматическое подключение каналов логирования](https://habr.com/ru/articles/790936/)
- [Механизмы безопасности в Laravel](https://habr.com/ru/articles/794348/)
- [Гудбай Pusher, привет Laravel Websockets](https://habr.com/ru/articles/795919/)
- [Laravel 11. Что нового?](https://habr.com/ru/articles/795165/)
- [Модификация JSON респонсов в Laravel](https://habr.com/ru/articles/794388/)
- [Превращение событий PostgreSQL в события Laravel](https://habr.com/ru/articles/798203/)

## Статьи

- [Управление устройствами умного дома Яндекс своими скриптами](https://habr.com/ru/articles/789200/)
- [Меняем моки репозиториев на in-memory реализации](https://habr.com/ru/companies/otus/articles/792680/)
- [Как я писал свою библиотеку для работы с Telegram](https://habr.com/ru/companies/kokocgroup/articles/794700/)
- [Улучшение кода без споров и цитирования известных практик](https://habr.com/ru/articles/794392/)
- [Практический пример декомпозиции монолитного PHP приложения](https://habr.com/ru/articles/796223/)
- [Как я обработал один миллиард строк в PHP]()
- [Паттерн Aggregate Outside]()

## Видео

- [PDO. Реализация Active Record](https://www.youtube.com/live/aCs2q0Pm30E)
- [Всё о PSR. Обзор стандартов PSR](https://youtu.be/TwZ9AVcHOeU)
- Публичное собеседование по алгоритмам:
    - [Часть 1](https://www.youtube.com/live/ZPGjJDIZm4Y)
    - [Часть 2](https://www.youtube.com/live/Wa9hUi8NeTs)
- [LivePHP Meetup](https://www.youtube.com/live/DhkTJcjJouc)
- [Typhoon 0.3.0](https://www.youtube.com/live/zW0wNb_2i2s)
- [Разбираем срез знаний для 3-его потока Хардкорного курса PHP](https://www.youtube.com/live/-BCacGtTUY4)
- [Конфигурируем Doctrine Schema без ORM](https://youtu.be/B4e7d3oYEeQ)
