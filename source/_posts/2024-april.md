---
title: Апрель 2024
author:
  - sergey
  - roman
date: 2024-04-30
external:
  - telegram: https://t.me/phpdigest
  - phpannotated: https://blog.jetbrains.com/phpstorm/2024/04/php-annotated-april-2024/
  - cutcode: https://youtu.be/nxo90UW_UpU
---

Подборка свежих новостей, инструментов, видео и материалов из мира PHP.

Приятного чтения!

## Новости

### [Заявление PHP об уязвимости в glibc/iconv](https://www.php.net/archive/2024.php#2024-04-24-1)

Шумиха вокруг [CVE-2024-2961](https://nvd.nist.gov/vuln/detail/CVE-2024-2961), связанная с PHP, была крайне
преувеличена. У многих сложилось впечатление, что уязвимость существует в самом языке и оказывает огромное влияние на
PHP-разработчиков. Однако это не так.

Уязвимость может быть удалённо использована только в том случае, если приложение использует функции и потоковые фильтры
модуля `iconv` с не валидированными кодировками, полученными из внешних источников.

Ваш код должен быть довольно необычным, чтобы подвергнуться такой атаке:

```php
iconv ('utf-8', $_REQUEST['charset'],' my -text');
```

Лучше проявить излишнюю осторожность и проверить использование `iconv`.

Не стоит ожидать выпуска патча от PHP, поскольку `glibc` является динамически подключаемой библиотекой и не
компилируется вместе с интерпретатором. Обновления `glibc` будет достаточно.

### Вышли [PHP 8.1.28](https://www.php.net/ChangeLog-8.php#8.1.28), [PHP 8.2.18](https://www.php.net/ChangeLog-8.php#8.2.18) и [PHP 8.3.6](https://www.php.net/ChangeLog-8.php#8.3.6)

❗ Это выпуски исправлений безопасности. В них
исправлены [CVE-2024-1874](https://github.com/php/php-src/security/advisories/GHSA-pc52-254m-w9w7), [CVE-2024-2756](https://github.com/php/php-src/security/advisories/GHSA-wpj3-hf5j-x4v4)
и [CVE-2024-3096](https://github.com/php/php-src/security/advisories/GHSA-h746-cjrr-wfmr), в PHP 8.3.6 дополнительно
исправлена уязвимость [CVE-2024-2757](https://github.com/php/php-src/security/advisories/GHSA-fjp9-9hwx-59fq).

❗️Выпуск PHP 8.3.5 был пропущен, пожалуйста, не используйте этот тег.

### [Всё, что нужно знать о бэкдоре в XZ](https://boehs.org/node/everything-i-know-about-the-xz-backdoor)

Если вы не следили за этой историей, то вот вкратце, что произошло.
Некто под GitHub-аккаунтом @JiaT75 в течение 2 лет вносил свой вклад в библиетеку `liblzma, создавая SSH-бэкдор
незаметно для других сопровождающих. Он сделал более 700 коммитов, из которых лишь небольшое количество было вредоносным
и спрятано в тестовых файлах.

Странное поведение было случайно обнаружено при проведении микробенчмаркинга утилиты XZ.
Скорее всего, эта атака не является единичным случаем. По крайней мере, OpenJS Foundation [уже сообщал о неудачных
попытках захвата](https://openssf.org/blog/2024/04/15/open-source-security-openssf-and-openjs-foundations-issue-alert-for-social-engineering-takeovers-of-open-source-projects/)
их проектов.

### Объединение усилий для разработки стандартов кибербезопасности

PHP Foundation будет сотрудничать с фондами Apache Software, Eclipse, Rust и Python Software для создания стандартов для
закона Европейского союза о киберустойчивости (CRA).

CRA – это первый в мире закон, регулирующий индустрию программного обеспечения в целом. Он обязывает определенные
проекты с открытым исходным кодом следовать политике кибербезопасности, сообщать об инцидентах и уязвимостях, а также
сотрудничать с органами надзора за рынком.

### [Вышел PhpStorm 2024.1](https://www.jetbrains.com/ru-ru/phpstorm/whatsnew/)

Главные новинки этой версии:

- Автодополнение строки целиком с помощью локального ИИ
- Поддержка Symfony AssetMapper
- Новый терминал
- Улучшения для Pest
- Поддержка PHPUnit 11.0

## PHP Core

Большинство новостей ядра PHP подробно освещаются в
серии [PHP Core Roundup](https://thephp.foundation/blog/tag/roundup/) от PHP Foundation, мы лишь быстро по ним
пробежимся:

### ✅ [RFC: Property hooks](https://wiki.php.net/rfc/property-hooks)

Хуки стали одним из самых больших и обсуждаемых RFC, в одном из предыдущих выпусках мы о них уже упоминали.

Они позволят разработчикам переопределять стандартное поведение `get` и `set` свойств объекта.

```php
class Foo
{
    private int $runs = 0;
 
    public function getRuns(): int { return $this->runs; }
 
    public function setRuns(int $runs): void
    {
      if ($runs <= 0) throw new Exception();
      $this->runs = $runs;
    }
}
 
$f = new Foo();
 
$f->setRuns($f->getRuns() + 1);
```

С помощью хуков свойств можно упростить:

```php
class Foo
{
    public int $runs = 0 {
        set {
            if ($value <= 0) throw new Exception();
            $this->runs = $value;
        }
    }
}
 
$f = new Foo();
$f->runs++;
```

Larry Garfield и Ilija Tovilo вдохновлялись языками Kotlin, C# и Swift при разработке этого RFC.

RFC был принят подавляющим большинством голосов и мы с нетерпением ждем хуки в PHP 8.4.

### 📣 [RFC: new MyClass()->method() without parentheses](https://wiki.php.net/rfc/new_without_parentheses)

RFC Валентина Удальцова, о котором мы говорили в конце прошлого года, перешел в стадию обсуждения.

### 📣 [RFC: array_find](https://wiki.php.net/rfc/array_find)

Joshua Rüsweg предлагает добавить новую функцию для поиска первого элемента, для которого callback-функция возвращает
значение `true`.

```php
$array = [ 'a' => 'dog', 'b' => 'cat', 'c' => 'cow', 'd' => 'duck', 'e' => 'goose'];

// Поиск первого животного, имя которого начинается с «с» 
var_dump(array_find($array, function (string $value) {
    return str_starts_with($value, 'c');
})); // cat
```

### 📣 [RFC: Casing of acronyms in class and method names](https://wiki.php.net/rfc/class-naming-acronyms)

Tim Düsterhus предлагает пересмотреть предыдущее решение RFC по именованию классов. Вместо того, чтобы относиться к
аббревиатурам как к обычным словам, сделать имена классов согласованными с PascalCase.

### 📣 [RFC: Support object type in BCMath](https://wiki.php.net/rfc/support_object_type_in_bcmath)

BCMath в настоящее время поддерживает только процедурные функции. Saki Takamachi предлагает добавить в модуле поддержку
объектов типов.

### 📊 [RFC: Deprecate GET/POST sessions](https://wiki.php.net/rfc/deprecate-get-post-sessions)

RFC о котором мы говорили в прошлом выпуске принят.

Сейчас PHP поддерживает два способа распространения идентификатора токена сессии: с помощью файлов cookie и с помощью
параметров GET или POST.

В PHP 8.4, если параметр `session.use_only_cookies` отключён, а параметр `session.use_trans_sid` – включён, будет
выдаваться предупреждение об устаревании.

В PHP 9.0 распространение идентификатора токена сессии с помощью параметров GET или POST будет удалено.

### 📊 [RFC: Release cycle update](https://wiki.php.net/rfc/release_cycle_update)

Поддержка безопасности для версий PHP увеличена на один год. Таким образом, каждая версия PHP будет поддерживаться 4
года: 2 года исправлений ошибок и 2 года исправлений безопасности.

Изменения применяются немедленно ко всем поддерживаемым в настоящее время веткам, а ветка PHP 8.1 получит дополнительный
год исправлений безопасности.

### ✅ [RFC: Deprecate implicitly nullable parameter types](https://wiki.php.net/rfc/deprecate-implicitly-nullable-types)

### ✅ [RFC: Dedicated StreamBucket class](https://wiki.php.net/rfc/dedicated_stream_bucket)

### ✅ [RFC: Grapheme cluster for str_split function: grapheme_str_split](https://wiki.php.net/rfc/grapheme_str_split)

### ❌ [RFC: Rounding Integers as int](https://wiki.php.net/rfc/integer-rounding)

### [Выбраны релиз-менеджеры PHP 8.4](https://wiki.php.net/todo/php84)

По традиции, у PHP 8.4 будет два новичка-релиз-менеджера: [Saki Takamachi](https://github.com/SakiTakamachi),
разработчик ядра PHP, поддерживаемый PHP
Foundation, и [Calvin Buckley](https://github.com/NattyNarwhal).

Им будет помогать ветеран релиз-менеджер PHP 8.3 [Eric Mann](https://github.com/ericmann).

## Инструменты

- [Modelflow AI](https://github.com/modelflow-ai) – A set of PHP packages that integrates various AI models and
  embeddings into a unified interface.

- [CodeWithKyrian/transformers-php](https://github.com/CodeWithKyrian/transformers-php) – A toolkit for PHP developers
  to add machine learning capabilities to their projects easily. Intro post: Announcing TransformersPHP.

- [distantmagic/resonance](https://github.com/distantmagic/resonance) – A framework specifically designed for building
  web applications with AI and ML capabilities. It’s based on Swoole and has built-in web and WebSocket servers.

- [tempestphp/highlight](https://github.com/tempestphp/highlight) – Fast, extensible, server-side code highlighting for
  web and terminal. Intro post: I wrote a code highlighter from scratch. See how to use it with Twig and Symfony.

- [pronskiy/phpup](https://github.com/pronskiy/phpup) – A single-file binary with zero dependencies that includes
  Composer and other PHP tools. It’s inspired
  by rustup and allows installing a per-project PHP based on your composer.json.

- [maglnet/ComposerRequireChecker](https://github.com/maglnet/ComposerRequireChecker) – A CLI tool to check whether a
  specific composer package uses imported symbols that
  aren’t part of its direct composer dependencies.

- [Can I PHP?](https://www.raycast.com/diana_scharf/can-i-php) – A Raycast extension that enables checking if a certain
  function or method is available in different
  versions of PHP.

- [opencodeco/codespaces-php](https://github.com/opencodeco/codespaces-php) – A GitHub Codespaces template for PHP that
  allows you to start developing a PHP project in
  no time on a remote machine. Try it out!

- [php-forge/foxy](https://github.com/php-forge/foxy) – A BUN/NPM/Yarn/PNpM bridge for Composer that’s compatible with
  Yii assets, Symfony Webpack Encore,
  and Laravel Mix.

- [nazmulpcc/php-webview](https://github.com/nazmulpcc/php-webview) – A WebView extension for PHP. This is a PoC, but in
  theory, it could be a nice basis for
  NativePHP.

- [buttress/phpx](https://github.com/buttress/phpx) – An experimental DOMDocument wrapper that generates safe HTML with
  ergonomic syntax.

- [luzrain/phpstreamserver](https://github.com/luzrain/phpstreamserver) – A PHP application server and process manager
  written in PHP on top of revoltphp/event-loop.
  It’s somewhat similar to php-pm/php-pm.

- [JBZoo/CSV-Blueprint](https://github.com/JBZoo/CSV-Blueprint/tree/master) – A strict and automated line-by-line CSV
  validation tool based on customizable YAML schemas.

- [shipmonk-rnd/composer-dependency-analyser](https://github.com/shipmonk-rnd/composer-dependency-analyser) – A tool for
  the fast detection of composer dependency issues, such as
  unused dependencies, shadow dependencies, and misplaced dependencies.

- [paragonie/phpecc](https://github.com/paragonie/phpecc) – A pure PHP elliptic curve cryptography library.

- [libvips/php-vips](https://github.com/libvips/php-vips) – An extremely fast image manipulation package that’s ~5 times
  faster than Imagick or GD and consumes
  less memory. It’s a good FFI example.

## Symfony

- 🎬 [Symfony of packages: как пакеты упрощают жизнь](https://youtu.be/MlqAxDjM04Y)

## Laravel

- 🎬 [Разбор Error Handling в Laravel](https://youtu.be/k9eN_RKDXGU)
- [Система уведомлений в ресурсах Laravel](https://habr.com/ru/articles/800723/)
- [Магический API Resource в Laravel](https://habr.com/ru/articles/800715/)

## Статьи

- [Как я уронил прод на полтора часа (и при чем тут soft delete и partial index)](https://habr.com/ru/companies/skyeng/articles/802191/)
- [Анемичная модель предметной области и логика в сервисах](https://habr.com/ru/articles/800789/)

## Видео

- [PHP Russia 2022](https://youtube.com/playlist?list=PLsdzlHt60Mu2Fcx_P7abk4WhmsxCTeQ31)
- [Пишем библиотеку для PHP на Rust](https://youtu.be/ISVhfVQYG-Q)
- [«Своя игра» по PHP #1](https://www.youtube.com/watch?v=WNIAO0kEk7U~~~~)