<header class="bg-white" x-data="{ open: false }">
    <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
        <a href="{{ $page->baseUrl }}/" class="-m-1.5 p-1.5 flex flex-row gap-2">
            <img class="h-8 w-auto" src="/assets/images/logo.png" alt="{{ $page->site }}">
            <span class="text-xl font-medium">{{ $page->site }}</span>
        </a>
        <div class="flex lg:hidden">
            <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700"
                    @click="open = true">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                     aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                </svg>
            </button>
        </div>
        <div class="hidden lg:flex lg:gap-x-12">
            <a href="{{ $page->baseUrl }}/posts" class="text-sm font-semibold leading-6 text-gray-900">Дайджесты</a>
            <a href="{{ $page->baseUrl }}/team" class="text-sm font-semibold leading-6 text-gray-900">Команда</a>
        </div>
    </nav>

    <div class="lg:hidden" role="dialog" x-show="open">
        <div class="fixed inset-0 z-10"></div>
        <div class="fixed inset-y-0 right-0 z-10 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
            <div class="flex items-center justify-between">
                <a href="{{ $page->baseUrl }}/" class="-m-1.5 p-1.5 flex flex-row gap-2">
                    <img class="h-8 w-auto" src="/assets/images/logo.png" alt="{{ $page->site }}">
                    <span class="text-xl font-medium">{{ $page->site }}</span>
                </a>
                <button type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700" @click="open = false">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                         aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <div class="mt-6 flow-root">
                <div class="-my-6">
                    <div class="space-y-2 py-6">
                        <a href="{{ $page->baseUrl }}/posts"
                           class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Дайджесты</a>
                        <a href="{{ $page->baseUrl }}/team"
                           class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Команда</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>