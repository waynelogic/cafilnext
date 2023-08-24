@php
$arAdminLinks = [
    [
        'title' => 'Дашборд',
        'url' => '/admin',
        'icon' => 'heroicon-o-home'
    ],
    [
        'title' => 'Формы',
        'url' => '/admin/form-records',
        'icon' => 'heroicon-o-clipboard-document-list'
    ],
]
@endphp

<nav class="container py-2">
    <ul class="flex max-sm:flex-col">
        @foreach($arAdminLinks as $link)
            <li>
                <a href="{{ $link['url'] }}" class="relative flex items-center justify-center gap-x-3 rounded-lg px-2 py-2 text-sm text-gray-700 outline-none transition duration-75 hover:bg-gray-100 focus:bg-gray-100 dark:text-gray-200 dark:hover:bg-white/5 dark:focus:bg-white/5 font-semibold">
                    @svg($link['icon'], 'w-6 h-6 text-gray-400 dark:text-gray-500')
                    <span class="flex-1 truncate">
                    {{ $link['title'] }}
                    </span>
                </a>
            </li>
        @endforeach
    </ul>
</nav>
