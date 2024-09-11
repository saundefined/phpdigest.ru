---
title: Сентябрь 2024
author:
  - sergey
  - roman
date: 2024-09-09
year: 2024
external:
  - telegram: https://t.me/phpdigest
  - phpannotated: https://blog.jetbrains.com/phpstorm/2024/09/php-annotated-september-2024/
  - cutcode: https://youtu.be/7NRC5OluuQ8
---

Подборка свежих новостей, инструментов, видео и материалов из мира PHP.

Приятного чтения!

## Новости

### [Первые альфа-версии PHP 8.4](https://wiki.php.net/todo/php84) доступны для тестирования

Вышли первые две альфа-версии, дающие начало выпуска PHP 8.4. Обновления будут выходить каждые две недели по
определённому графику, а финальный выпуск ожидается 21 ноября.

Заморозка функций ожидается 13 августа, а это значит, что некоторые изменения еще могут попасть в выпуск. На данный
момент наиболее заметными являются следующие изменения:

- [Хуки свойств](https://wiki.php.net/rfc/property-hooks)
- [Вызов `new` без скобок](https://wiki.php.net/rfc/new_without_parentheses)
- [Изменения JIT](https://wiki.php.net/rfc/jit_config_defaults)
- [Новая поддержка HTML5](https://wiki.php.net/rfc/domdocument_html5_parser)
- [Функции для работы с массивами](https://wiki.php.net/rfc/array_find): `array_find()`, `array_find_key()`,
  `array_any()`
  и `array_all()`.

Напоминаю, что, с этого года сократился предрелизный цикл, вместо 6 релиз-кандидат версий, теперь будет 4, а каждая
версия теперь поддерживается на год дольше.

Поздравляю Кельвина, Саки и Эрика!

### Вышли [PHP 8.2.23](https://www.php.net/ChangeLog-8.php#8.2.23) и [PHP 8.3.11](https://www.php.net/ChangeLog-8.php#8.3.11)

Выпуски с исправлениями ошибок вышли по расписанию.

### [The State of Laravel Survey 2024](https://stateoflaravel.com/?ref=2024)

Tobias Petry запустил ежегодный опрос о состоянии сообщества Laravel. На сайте также доступны
прошлогодние [результаты опроса](https://stateoflaravel.com/results).

### [State of Generics and Collections](https://thephp.foundation/blog/2024/08/19/state-of-generics-and-collections/)

Arnaud Le Blanc, Derick Rethans и Larry Garfield рассказали о текущем состоянии дженериков в PHP.
Вы можете принять участие в обсуждении в [списке рассылок](https://externals.io/message/125049) и
на [Reddit](https://www.reddit.com/r/PHP/comments/1ew7hik/state_of_generics_and_collections/).

### [Вышел PhpStorm 2024.2](https://www.jetbrains.com/ru-ru/phpstorm/whatsnew/)

В этой версии вас
ждет [поддержка лог-файлов](https://blog.jetbrains.com/phpstorm/2024/08/laravel-log-files-support-in-phpstorm/),
редактирование из плавающей панели инструментов, автодополнение в новом
терминале, улучшенное автодополнение строки целиком и многое другое.

С полным списком изменений можно ознакомиться на сайте JetBrains.

## PHP Core

Большинство новостей ядра PHP подробно освещаются в
серии [PHP Core Roundup](https://thephp.foundation/blog/tag/roundup/) от PHP Foundation, мы лишь быстро по ним
пробежимся:

### ❌ [RFC: Static class](https://wiki.php.net/rfc/static_class)

RFC не набрал необходимый процент голосов и был отклонён.

### ✅ [RFC: Lazy Objects](https://wiki.php.net/rfc/lazy-objects)

В PHP 8.4 появятся ленивые объекты. Эти объекты будут инициализироваться и потреблять ресурсы только при чтении или
изменении свойства.

Хотя ленивые объекты не будут использоваться непосредственно большинством пользователей, они предназначены в первую
очередь для авторов библиотек и фреймворков, позволяя им удалить большое количество шаблонного кода.

### 📣 [RFC: Improve language coherence for the behaviour of offsets and containers](https://wiki.php.net/rfc/container-offset-behaviour)

PHP поддерживает доступ к элементам контейнера смещением с помощью скобок `[]` со следующей нотацией
`$container[$offset]`.
Однако поведение таких обращений зависит не только от типа контейнера и смещения, но и от операции, которая выполняется
при обращении к смещению. Существующее поведение крайне непоследовательно и трудно предсказуемо.

Gina Peter Banyard предлагает улучшить согласованность языка для смещений и контейнеров.

### ✅ [RFC: Add bcdivmod to BCMath](https://wiki.php.net/rfc/add_bcdivmod_to_bcmath)

В настоящее время в PHP есть функция `bcdiv()` для деления чисел произвольной точности и функция `bcmod()` для получения
остатка после деления.

В PHP 8.4 появится новая функция `bcdivmod()`, которая позволит получить частное и остаток за одну операцию в виде
массива.

### ✅ [RFC: Property hook improvements](https://wiki.php.net/rfc/hook_improvements)

После внедрения хуков свойств, Ilija Tovilo и Larry Garfield нашли способ реорганизовать логику, чтобы увеличить
производительность.

RFC прошел стадию голосования и мы получим улучшения хуков уже в PHP 8.4.

### ✅ [RFC: Asymmetric Visibility v2](https://wiki.php.net/rfc/asymmetric-visibility-v2)

Со второй попытки RFC был принят. Синтаксис, подобный Swift, позволяющий свойствам иметь отдельную («асимметричную»)
видимость для операций чтения и записи появится в PHP 8.4.

### 📣 [RFC: Function Autoloading v4](https://wiki.php.net/rfc/function_autoloading4)

Используя автозагрузчики (например, `composer`), пользователи уже могут быстро освоиться с классами, но в настоящее
время в языке нет возможности сделать то же самое с функциями.

Robert Landers предложил добавить возможность автозагрузки функций.

### 📣 [RFC: Should PHP have a directive that makes the parser treat all namespaced function calls as global?](https://wiki.php.net/rfc/global_function_parser_directive)

При вызове функций из глобального пространства имен парсер PHP создает опкоды, которые используют эти функции напрямую.
Парсер может использовать специальные опкоды, оптимизированные для вызова определенных встроенных функций.

Nick Lockheart призывает обсудить вопрос о том, должна ли в PHP быть директива, которая заставляет парсер рассматривать
все вызовы функций из пространства имен как глобальные.

### 📣 [RFC: Default expression](https://wiki.php.net/rfc/default_expression)

Единственный способ передать значение по умолчанию параметру функции или метода – не передавать ничего. Paul Morris
предлагает ввести выражение `default` в контекстах передачи аргументов, чтобы использовать значение по умолчанию функции
или метода.

```php
function greetingEveryone($greeting = 'Hello', $subject = 'World') {
    return sprintf('%s, %s!', $greeting, $subject);
}

var_dump(greetingEveryone(default, 'Earth')); // Hello, Earth!
```

## Инструменты

- [arokettu/composer-license-manager](https://github.com/arokettu/composer-license-manager) – Плагин для Composer,
  позволяющий задавать лицензионную политику, например,
  список разрешённых лицензий для проекта и избегать проприетарных пакетов, пакетов с недопустимыми лицензиями или
  вообще без лицензии.

- [composer/pcre](https://github.com/composer/pcre) – Библиотека-обертка PCRE, предлагающая безопасные для типов замены
  `preg_*`.

- [Sammyjo20/ssh-php](https://github.com/Sammyjo20/ssh-php) – До смешного простая отправная точка для создания
  приложений PHP SSH.

- [ServBay](https://www.servbay.com/) – Локальная среда разработки, альтернатива Laravel Herd.

- [HiEventsDev/Hi.Events](https://github.com/HiEventsDev/Hi.Events) – Платформа для управления мероприятиями и продажи
  билетов с открытым исходным кодом.

- [freescout-help-desk/freescout](https://github.com/freescout-help-desk/freescout) – Бесплатная служба поддержки на
  собственном хостинге и общий почтовый ящик (
  альтернатива Zendesk / Help Scout).

- [savinmikhail/Comments-Density](https://github.com/savinmikhail/Comments-Density) – Анализ плотности и качества
  комментариев в PHP-файлах для поддержания и улучшения
  качества документации по коду.

- [prasathmani/tinyfilemanager](https://github.com/prasathmani/tinyfilemanager) – Однофайловый файловый менеджер PHP,
  браузер и управление файлами.

- [TicketSwap/phpstan-error-formatter](https://github.com/TicketSwap/phpstan-error-formatter) – Минималистичный форматер
  ошибок для PHPStan.

## Symfony

- [Повышаем читаемость Symfony DI](https://habr.com/ru/articles/833134/)

## Laravel

- 🎬 [Laravel Debugbar: эффективная отладка кода. Настройка и использование пакета](https://youtu.be/aVMf1ebQjj4)
- 🎬 [Перетаскивание элементов в таблице (Reorder): в админ-панели MoonShine](https://youtu.be/19ZM3_Mfobc)
- 🎬 [Мой опыт использования PEST для тестирования проекта на Laravel](https://youtu.be/1tWhPTmLW34)
- [Использование Laravel драйвера centrifugo для широковещания](https://habr.com/ru/articles/827092/)
- [Сигналы в Artisan командах](https://laravel.su/p/signaly-v-artisan-komandax)
- [Кастомные Query Builders в Laravel](https://laravel.su/p/kastomnye-query-builders-v-laravel)
- [Добавление Swagger UI в ваше приложение Laravel](https://habr.com/ru/articles/834902/)

## Статьи

- [PHP 8.4: Новые функции поиска в массиве. Пишем с нуля](https://habr.com/ru/articles/827854/)
- [Статистика использования версий PHP: июль 2024 года](https://habr.com/ru/articles/827658/)
- [Golang убивает PHP](https://habr.com/ru/articles/830354/)
- [PHP функции и способы их применения](https://habr.com/ru/articles/831388/)
- [Разработчики на PHP умеют писать код, но не всегда знают как устроен web-server](https://habr.com/ru/articles/832040/)
- [Посвящается никому](https://vk.com/@kphp-all)
- [Yaml — король мета-описаний](https://habr.com/ru/articles/834270/)
- [Отладка PHP сценариев в Docker-контейнере с помощью PhpStorm и Xdebug. Глубокое погружение](https://habr.com/ru/articles/834922/)
- [В мире PHP #2](https://triangular-octopus-0f6.notion.site/PHP-2-d67a1f346b8541729fb3aa476e0fa086)

## Видео

- [Мастер-класс по Temporal на примере регистрации пользователей с KYC и Email верификацией](https://www.youtube.com/live/QhXpI9rVnN8)
- [Разбираем срез знаний 4-ого потока Хардкорного курса PHP](https://www.youtube.com/live/wGegvTFidaA)
- [Мастер-класс по созданию парсера protobuf синтаксиса на PHP с помощью AI](https://www.youtube.com/live/xyk0sLe8Q9I)
- [Разработка LLM-агентов на PHP: Пошаговое руководство](https://www.youtube.com/live/A976uZxW_8E)

## События

- [Podlodka PHP Crew](https://podlodka.io/phpcrew), 30 сентября – 4 октября, 2024
- [PHP Russia 2024](https://cfp.phprussia.ru/), 2-3 декабря 2024
