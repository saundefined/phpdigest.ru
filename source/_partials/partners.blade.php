<div class="bg-gradient-to-r from-gray-100 to-white py-24">
    <div class="mx-auto w-full max-w-2xl px-6 lg:max-w-7xl">
        <div class="flex flex-wrap items-center justify-between gap-x-8 gap-y-3">
            <div class="text-3xl font-bold sm:text-4xl lg:text-[40px]">
                <a href="/partners" class="hover:text-red-600">Наши друзья</a>
            </div>
        </div>
        <div class="mt-12 grid gap-8 md:mt-16 md:grid-cols-2 lg:grid-cols-3">
            @include('_partials.partners-item', [
                'title' => 'Слоны PHP',
                'description' => 'Купить мягкую игрушку со скидкой по промокоду «PHPDIGEST»',
                'url' => 'https://elephpants.ru/',
                'image' => '/assets/images/logo/elephpants.jpeg'
            ])
            @include('_partials.partners-item', [
                'title' => 'Пятиминутка PHP',
                'description' => 'Подкаст о PHP, DBA, архитектуре, DevOps',
                'url' => 'https://5minphp.ru/',
                'image' => '/assets/images/logo/5minphp.png'
            ])
            @include('_partials.partners-item', [
                'title' => 'CutCode',
                'description' => 'YouTube канал Данил Щуцкого, посвященный PHP и Laravel',
                'url' => 'https://cutcode.dev/',
                'image' => '/assets/images/logo/cutcode.jpg'
            ])
            @include('_partials.partners-item', [
                'title' => 'Пых',
                'description' => 'Блог Валентина Удальцова о разработке на PHP',
                'url' => 'https://t.me/phpyh',
                'image' => '/assets/images/logo/phpyh.jpeg'
            ])
            @include('_partials.partners-item', [
                'title' => 'Хроники Yii3',
                'description' => 'Описание процесса разработки фреймворка из первых рук',
                'url' => 'https://t.me/yii3chronicles',
                'image' => '/assets/images/logo/yii.jpeg'
            ])
            @include('_partials.partners-item', [
                'title' => 'Laravel World',
                'description' => 'Новости PHP и Laravel. Уроки, советы, секреты',
                'url' => 'https://t.me/laravel_it',
                'image' => '/assets/images/logo/laravel-world.jpeg'
            ])
        </div>
    </div>
</div>
