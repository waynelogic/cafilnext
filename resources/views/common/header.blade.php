<div class="p-3 bg-neutral-800 text-white">
    <div class="container">
        <div class="grid md:grid-cols-12 gap-6">
            <div class="md:col-span-3 lg:col-span-2 md:order-2 flex items-center">
                <a class="info_line_brand" href="/">
                    <img src="images/home/filnext_logo_white.svg" alt="ФиЛнекст" width="100%" class="mb-0 max-w-xs mx-auto">
                </a>
            </div>
            <div class="md:col-span-4 lg:col-span-5 md:text-end flex items-center md:justify-end md:order-1">
                <span class="inline-block bg-primary p-2 max-md:mr-4 md:ml-4 md:order-2">
                    <x-heroicon-s-phone class="w-7 h-7"/>
                </span>
                <div>
                    <p class="font-semibold">Телефон горячей линии:</p>
                    <a href="tel://+79918510202" class="text-sm text-white">+7 991 851 02 02</a>
                </div>
            </div>
            <div class="md:col-span-4 lg:col-span-5 flex items-center md:order-3">
                <span class="inline-block bg-primary p-2 mr-4">
                    <x-heroicon-s-map-pin class="w-7 h-7"/>
                </span>
                <div>
                    <p class="font-semibold">Наш адрес</p>
                    <p class="text-sm opacity-80">344038, Ростовская область, г. Ростов-На-Дону, ул Нансена, здание 103М, помещение 5</p>
                </div>
            </div>
        </div>
    </div>
</div>
@php
    $menuItems = [
        [
            'title' => 'Главная',
            'url' => '#home'
        ],
        [
            'title' => 'О нас',
            'url' => '#about'
        ],
        [
            'title' => 'Деятельность',
            'url' => '#services'
        ],
        [
            'title' => 'Оплата',
            'url' => '#payment'
        ],
        [
            'title' => 'Вопросы',
            'url' => '#faq'
        ],
        [
            'title' => 'Контакты',
            'url' => '#contacts'
        ],

    ]
@endphp
<header class="bg-white shadow-md top-0 sticky z-50">
    <div class="container max-lg:justify-between flex flex-wrap items-center py-3">
        <div class="lg:hidden max-lg:order-1 text-xl font-serif font-semibold">Меню</div>
        <nav class="max-lg:w-full bg-white inset-0 max-lg:order-last ">
            <ul class="flex items-center max-lg:flex-col max-lg:space-y-2">
                @foreach($menuItems as $menuItem)
                    <li class="max-lg:w-full">
                        <a class="max-lg:w-full inline-flex text-lg px-4 py-2 max-lg:border rounded-lg" href="{{ $menuItem['url'] }}">{{ $menuItem['title'] }}</a>
                    </li>
                @endforeach
            </ul>
        </nav>
        <button type="button" class="max-lg:order-2 lg:hidden px-3 py-1 rounded-xl border border-black/30">
            <x-heroicon-o-bars-3 class="w-8 h-8 shrink-0"/>
        </button>

    </div>
</header>
