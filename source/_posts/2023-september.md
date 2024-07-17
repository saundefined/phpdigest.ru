---
title: Сентябрь 2023
author:
  - sergey
  - roman
date: 2023-09-27
year: 2023
external:
  - telegram: https://t.me/phpdigest
  - phpannotated: https://blog.jetbrains.com/phpstorm/2023/09/php-annotated-september-2023/
  - cutcode: https://youtu.be/Ja2TNFpAuzA
---

Подборка свежих новостей, инструментов, видео и материалов из мира PHP.

Приятного чтения!

## Новости

### Вышли [PHP 8.1.24](https://www.php.net/ChangeLog-8#8.1.24) и [PHP 8.2.11](https://www.php.net/ChangeLog-8#8.2.11)

Выпуски с исправлениями ошибок вышли по расписанию.

### [Вышел третий релиз кандидат PHP 8.3.0](https://www.php.net/archive/2023.php#2023-09-28-2)

Очередной RC был выпущен в соответствии с [расписанием](https://wiki.php.net/todo/php83). Следующий релиз – RC4
ожидается 12 октября.

С подробным списком изменений в PHP 8.3, можно ознакомиться на сайтах [php.watch](http://php.watch/)
или [stitcher.io](http://stitcher.io/).

### [PhpStorm Public Roadmap: What’s Coming in 2023.3](https://blog.jetbrains.com/phpstorm/2023/09/phpstorm-public-roadmap-whats-coming-in-2023-3/)

Команда PhpStorm в 2023.3 планирует добавить комплексную поддержку PHP 8.3, возможность исключать каталоги и файлы
внешних библиотек для ускорения индексации, специальную стилизацию типов в дженериках.

Для Symfony разработчиков будет полезным мастер создания нового проекта, преобразование аннотаций Doctrine в атрибуты, а
также поддержка Doctrine Query Language внутри QueryBuilder.

### [Вышел CakePHP 5](https://bakery.cakephp.org/2023/09/09/cakephp_500.html)

Команда CakePHP выпустила пятую версию фреймворка, которая была в разработке последние два года. Теперь для работы
требуется PHP 8.1 и выше, улучшены подсказки по всему фреймворку.

CakePHP теперь использует объединения типов для формализации типов многих параметров во всей платформе, обновлён PHPUnit
до 10 версии, новая поддержка сопоставления перечисления типов в ORM, обеспечивающая более выразительные слои модели с
улучшенной проверкой типов, добавлена поддержка HTTP-фабрик PSR17 и многое другое.

### [State of Laravel 2023](https://stateoflaravel.com/results)

Завершилось исследование по Laravel, в котором приняло участие более 4000 разработчиков.

## PHP Core

Большинство новостей ядра PHP подробно освещаются в
серии [PHP Core Roundup](https://thephp.foundation/blog/tag/roundup/) от PHP Foundation, мы лишь быстро по ним
пробежимся:

### 📊 [RFC: Increasing the default BCrypt cost](https://wiki.php.net/rfc/bcrypt_cost_2023)

Tim Düsterhus предлагает увеличить значение параметра cost в BCrypt по умолчанию, обозначающего алгоритмическую
стоимость, которая должна использоваться, с 10 до 11 (двухкратное увеличение времени) или до 12 (четырехкратное
увеличение времени).

### 📣 [RFC: DOM HTML5 parsing and serialization](https://wiki.php.net/rfc/domdocument_html5_parser)

Niels Dossche предлагает добавить в модуле DOM два новых класса: `HTMLDocument` и `XMLDocument`.

Класс `HTMLDocument` добавит поддержку разбора и сериализации HTML5-документов в соответствии со спецификацией.
Класс `XMLDocument` будет служить современной альтернативой классу `DOMDocument`, который сохраняется для совместимости.

Эти новые классы также обеспечат более устойчивый к злоупотреблениям API для загрузки документов.

Существующие классы DOM в глобальном пространстве имён получат псевдоним в новом пространстве имён DOM, так что новая
реализация будет использоваться по умолчанию.

### 📣 [RFC: A new JIT implementation based on IR Framework](https://wiki.php.net/rfc/jit-ir)

Дмитрий Стогов предлагает новую реализацию Just-in-Time компилятора, основанную на собственном фреймворке
Дмитрия [Intermediate Representation](https://github.com/dstogov/ir).

Основной плюс нового подхода в том, что исходный код PHP освободится от низкоуровневых деталей JIT-компиляции. Теперь
интерпретатор будет формировать так называемое промежуточное представление, которое вышеупомянутый фреймворк превратит в
ассемблерный код с учётом процессорной специфики. Также новый JIT позволит в будущем применить дополнительные
оптимизации (видимо, уже на стороне фреймворка) для получения более эффективного машинного кода. Минус же состоит в
более долгой JIT-компиляции.

Изначально Дмитрий собирался оставлять обе версии JIT, но, судя по обсуждению в PR, многие не против просто поменять
старую на новую и не париться с поддержкой двух компиляторов.

### ❌ [RFC: Support optional suffix parameter in tempnam](https://wiki.php.net/rfc/tempnam-suffix-v2)

RFC был отклонён.

Основная проблема – суффикс не будет работать в Windows. Чтобы избежать больших проблем из-за незначительного изменения,
многие проголосовали против.

## Инструменты

- [emreyarligan/enum-concern](https://github.com/emreyarligan/enum-concern) – Пакет для удобной работы с перечислениями
  на основе коллекций Laravel.

- [hyperf/hyperf](https://github.com/hyperf/hyperf) – Корутинный фреймворк на основе Swoole, ориентированный на скорость
  и гибкость.

- [loupe-php/loupe](https://github.com/loupe-php/loupe) – Полнотекстовая поисковая система, основанная только на PHP и
  SQLite, с токенизацией, стеммингом, допуском опечаток, фильтрами и поддержкой геопозиционирования.

- [TomasVotruba/lines](https://github.com/TomasVotruba/lines/) – CLI-инструмент, запускаемый в любом месте, для быстрого
  измерения размера PHP-проектов.

- [Chemaclass/bashunit](https://github.com/Chemaclass/bashunit) – Минималистичная библиотека для тестирования
  bash-скриптов.

- [laminas/laminas-text](https://github.com/laminas/laminas-text/) – Вы когда-нибудь хотели получить прикольный
  текстовый баннер в формате ASCII?

- [espocrm/espocrm](https://github.com/espocrm/espocrm) – Развитая CRM с открытым исходным кодом, построенная на PHP.

- [Can I PHP?](https://caniphp.com/) — Быстрая проверка того, в какой версии PHP появился тот или иной функционал.

## Laravel

- 🎬 [Обзор пакета Laravel Folio](https://youtu.be/Hr5uNoOjnrU)
- 🎬 [Обзор пакета Laravel Prompts](https://youtu.be/2wzNvOPUu-w)
- 🎬 [Обзор NativePHP](https://youtu.be/qz7pqJqa0sk)
- [Организация кода в Laravel. Личный опыт](https://habr.com/ru/articles/760022/)
- [Первый взгляд на MoonShine](https://habr.com/ru/articles/760582/)

## Symfony

- [gRPC сервер и клиент на Symfony](https://igancev.ru/2023-08-14-grpc-server-on-symfony)
- [EasyAdmin и Mercure: реальный юзкейс](https://habr.com/ru/companies/otus/articles/754806/)
- ❗[Twig 2 end of life](https://symfony.com/blog/twig-2-end-of-life)

## Статьи

- [Ускоряем PHPUnit Code Coverage с помощью PCOV](https://wp-yoda.com/php/phpunit/uskorenie-phpunit-code-coverage-s-pomoshhyu-pcov/)
- [PHP Fibers: практический пример](https://habr.com/ru/articles/756642/)
- [Как мы планировали повысить версию PHP за месяц, а потратили на это год](https://habr.com/ru/companies/yandex/articles/756498/)
- [Почему тип поля enum на уровне базы — зло](https://habr.com/ru/articles/757212/)
- [Уменьшаем количество багов в коде расширяя возможности статического PHP анализатора Psalm](https://habr.com/ru/articles/757188/)
- [Технология передачи данных в секретный контур](https://habr.com/ru/articles/758338/)
- [Интернет из PHP](https://habr.com/ru/articles/759946/)
- Неортодоксальный Eloquent [Часть 1](https://habr.com/ru/articles/762598/), [Часть 2](https://habr.com/ru/articles/762690/)

## Видео

- [PHP-линч #20](https://www.youtube.com/live/j7w5nmk2AFE?feature=share)
- [PHP-линч #21](https://www.youtube.com/live/DxmX2A_WJTk?si=8wIQX7rG40EmTHte)
- [Атрибуты в PHP](https://youtu.be/fyeTC_E1ThA)
- [Typhoon 0.2.0](https://www.youtube.com/live/lp5zj0DdQ28?si=Nz471KYe8MofzC1L)

## События

- [Podlodka PHP Crew, 16 – 20 октября](https://podlodka.io/phpcrew)

## Развлечения

- [phpgl/flappyphpant](https://github.com/phpgl/flappyphpant) – Простая игра, похожая на Flappy Bird, написанная на PHP и построенная на основе PHP-GLFW и фреймворка VISU.

![](/assets/images/post/2023-september/flappyphpant.gif)

