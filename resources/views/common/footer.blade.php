<footer class="p-3 bg-neutral-800 text-white">
    <div class="container py-12">
        <div class="grid lg:grid-cols-2 gap-20">
            <div>
                <img src="images/home/fl_logo.svg" alt="ФиЛнекст" width="100%" class="mb-0">
                <p class="mt-4">Юридическая компания «ФиЛнекст» специализируется на работе с долговыми обязательствами по всей России.</p>
            </div>
            <div>
                <div class="text-3xl font-serif mb-2">Есть вопросы?</div>
                <ul class="space-y-3">
                    <li>
                        <span href="" class="flex items-center">
                            <x-heroicon-s-map-pin class="w-6 h-6"/>
                            <span class="ml-2">344038, Ростовская область, г. Ростов-На-Дону, ул Нансена, здание 103М, помещение 5</span>
                        </span>
                    </li>
                    <li>
                        <a href="tel://+79918510202" class="flex items-center">
                            <x-heroicon-s-phone class="w-6 h-6"/>
                            <span class="ml-2">+7 991 851 02 02</span>
                        </a>
                    </li>
                    <li>
                        <a href="mailto:ca@filnext.ru" class="flex items-center">
                            <x-heroicon-s-envelope class="w-6 h-6"/>
                            <span class="ml-2">ca@filnext.ru</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <p class="text-center mt-6">Copyright © 2017 - {{ \Carbon\Carbon::now()->format('Y')  }}. Все права защищены компанией Альбус</p>
    </div>
</footer>
