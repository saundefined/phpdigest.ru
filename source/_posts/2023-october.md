---
title: Октябрь 2023
author:
  - sergey
  - roman
date: 2023-10-31
external:
  - telegram: https://t.me/phpdigest
  - phpannotated: https://blog.jetbrains.com/phpstorm/2023/10/php-annotated-october-2023/
  - cutcode: https://youtu.be/DVIM4-Z3nwk
---

Подборка свежих новостей, инструментов, видео и материалов из мира PHP.

Приятного чтения!

## Новости

### Вышли [PHP 8.1.25](https://www.php.net/ChangeLog-8#8.1.25) и [PHP 8.2.12](https://www.php.net/ChangeLog-8#8.2.12)

В этих выпусках несколько исправлений ошибок и улучшений в модулях Core, CLI, CType, DOM, Fileinfo, Filter, Hash, Intl,
MySQLnd, Opcache, PCRE, SimpleXML, Streams, XML и XSL.

### Вышел [PHP 8.3.0 RC5](https://www.php.net/archive/2023.php#2023-10-26-1)

Очередной RC был выпущен в соответствии с [расписанием](https://wiki.php.net/todo/php83). Следующий релиз – RC6
ожидается 9 ноября и станет последним перед финальным релизом PHP 8.3.

С подробным списком изменений в PHP 8.3, можно ознакомиться на сайтах [php.watch](http://php.watch/)
или [stitcher.io](http://stitcher.io/).

Версии PHP 8.3.0 RC доступны в репозиториях [Remi](https://rpms.remirepo.net/) для Fedora/RHEL,
репозиториях [Ondrej](https://deb.sury.org/#php-packages) для Debian/Ubuntu
LTS, [образах Docker](https://hub.docker.com/_/php/tags?page=1&name=8.3) на Docker Hub и скомпилированных двоичных
файлах Windows на [windows.php.net](http://windows.php.net/).

### 🎂 [Symfony исполнилось 18 лет](https://web.archive.org/web/20080915154420/http://trac.symfony-project.org/changeset/1)

18 октября 2005 года был сделан первый публичный коммит проекта Symfony.

### [Открыта программа раннего доступа PhpStorm 2023.2](https://blog.jetbrains.com/phpstorm/2023/10/the-phpstorm-2023-3-early-access-program-is-now-open/)

В первой версии EAP улучшена поддержка PHP 8.3, добавлен мастер создания новых проектов для Symfony и поддержку
преобразования аннотаций Doctrine в атрибуты.

## PHP Core

Большинство новостей ядра PHP подробно освещаются в
серии [PHP Core Roundup](https://thephp.foundation/blog/tag/roundup/) от PHP Foundation, мы лишь быстро по ним
пробежимся:

### 📣 [RFC: Rounding Integers as int](https://wiki.php.net/rfc/integer-rounding)

На данный момент функции округления `round()`, `ceil()` и `floor()` возвращают число с плавающей точкой, но при
использовании целых чисел выше `2^53` получаются неожиданные результаты из-за потери точности.

Marc Bennewitz предлагает выполнять округление для заданного целого числа и возвращать полученное целое число, если это
возможно.

### 📣 [RFC: Unbundle ext/imap, ext/pspell, ext/oci8, and ext/PDO_OCI](https://wiki.php.net/rfc/unbundle_imap_pspell_oci8)

Derick Rethans предлагает удалить модули из ядра PHP и перенести в репозиторий PECL.

### 📣 [RFC: Multibyte for trim function mb_trim, mb_ltrim and mb_rtrim](https://wiki.php.net/rfc/mb_trim)

Yuya Hamada предлагает добавить многобайтовую поддержку для функций обрезки.

### 📣 [RFC: RFC1867 for non-POST HTTP](https://wiki.php.net/rfc/rfc1867-non-post)

RFC1867 определяет тип контента `multipart/form-data`. PHP поддерживает анализ этого типа контента, но только для
POST-запросов. Если осуществляется POST-запрос и тип содержимого `multipart/form-data`, тело запроса немедленно
обрабатывается перед запуском PHP-скрипта и заполняется в суперглобальные переменные `$_POST` и `$_FILES`. Эта функция
запускается автоматически и не предоставляется непосредственно пользователю.

Ilija Tovilo предлагает добавить новую функцию `request_parse_body()`, чтобы вывести существующую функциональность на
пользовательский уровень и использовать ее для других HTTP-методов, например, `PUT` и `PATCH`.

### 📣 [RFC: Change the edge case of round()](https://wiki.php.net/rfc/change_the_edge_case_of_round)

Saki Takamachi предлагает изменить поведение функции round в крайних случаях и перестать ожидать от чисел с плавающей
точкой десятичного поведения и начать ожидать, что числа с плавающей точкой будут вести себя как числа с плавающей
точкой.

### ✅ [RFC: Increasing the default BCrypt cost](https://wiki.php.net/rfc/bcrypt_cost_2023)

RFC принят единогласно. Большинством голосов было принято, что в PHP 8.4 значение cost по умолчанию будет увеличено
до `12`.

### ✅ [RFC: A new JIT implementation based on IR Framework](https://wiki.php.net/rfc/jit-ir)

RFC также принят единогласно в обоих голосованиях: в PHP 8.4 появится новая реализация JIT, тем временем старая
реализация будет удалена.

## Инструменты

- [saloonphp/saloon](https://github.com/saloonphp/saloon) – Пакет для создания красивых API-интеграций и SDK.

- [dunglas/frankenphp](https://github.com/dunglas/frankenphp) – Современный сервер для PHP-приложений со всем
  необходимым: автоматическое получение и продление SSL, HTTP/3, 103 Early Hints, Zstandard и работа в режиме воркера
  для PHP. Он построен на базе Caddy и предлагает самый простой процесс настройки.

- [utopia-php/framework](https://github.com/utopia-php/framework) – Лёгкий и быстрый микро PHP-фреймворк, который легко
  освоить, поддерживается [командой Appwrite](https://appwrite.io/).

- [phpro/soap-client](https://github.com/phpro/soap-client) – Универсальный SOAP-клиент для PHP.

- [flow-php/flow](https://github.com/flow-php/flow) – Сильно типизированный фреймворк обработки данных.

- [benholmen/defrag](https://github.com/benholmen/defrag) – Вывод результатов дефрагментации диска для тестов PHPUnit.

![](/assets/images/post/2023-october/benholmen-defrag.gif)

- [flavioheleno/watchr](https://github.com/flavioheleno/watchr) – Утилита командной строки и GitHub Action, проверяющая
  сроки действия сертификатов доменных имен и TLS.

- [ad-aures/castopod](https://github.com/ad-aures/castopod) – Хостинг платформа для подкастов с открытым исходным кодом,
  созданная на основе CodeIgniter.

## Laravel

- [Постановка задачи (Job) в очередь Laravel из хранимой процедуры или триггера PostgreSQL](https://habr.com/ru/articles/768136/)
- [Persistent-request библиотека для надежных запросов](https://habr.com/ru/articles/767112/)
- 🎬 [Директива Props в blade-компонентах](https://youtu.be/FepoE5cI-WM)
- 🎬 [Обзор Livewire 3 и Volt](https://youtu.be/7eSQ6AT_gt0)
- 🎬 [LazyCollections и PHP генераторы](https://youtu.be/vkAsNffJ_ZY)

## Yii

- Вышел [yiisoft/router-composer-attribute-collector](https://github.com/yiisoft/router-composer-attribute-collector)
- Вышел [yiisoft/strings](https://github.com/yiisoft/strings) 2.3
- Вышел [yiisoft/auth](https://github.com/yiisoft/auth) 3.1
- 🎬 [Инструменты обеспечения качества библиотек в PHP](https://youtu.be/CiA3L8n8rJI)

## Статьи

- [Code smells — обзор на примере PHP](https://habr.com/ru/articles/768038/)
- [Какой длины должны быть классы — когда «чистый» код на самом деле не так уж и хорош](https://habr.com/ru/companies/beeline_cloud/articles/768878/)

## Видео

- [Разбираем срез знаний для "Хардкорного курса PHP"](https://www.youtube.com/live/8RFgWCdLJ38)