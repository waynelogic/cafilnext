<div x-data="flash">
    <template x-if="messages.length > 0">
        <div class="fixed top-20 right-1/2 translate-x-1/2 z-50 flex flex-col gap-2 w-full max-w-md">
            <template x-for="item in messages">
                <div :class="{'bg-red-600': item.type === 'error', 'bg-lime-600': item.type === 'success', 'bg-blue-600': item.type === 'info'}" class="flex justify-between items-center gap-4 text-white px-4 py-2 rounded-lg">
                    <span class="text-lg" x-text="item.message"></span>
                    <button @click="remove(item.id)">
                        <x-heroicon-s-x-mark class="size-5 shrink-0"/>
                    </button>
                </div>
            </template>
        </div>
    </template>
</div>

<footer class="relative bg-[#181f29] text-white pt-8 pb-6">
    <div class="container">
        <div class="grid lg:grid-cols-7">
            <div class="lg:col-span-3">
                <div class="mt-6 lg:mb-0 mb-6">
                    <img src="images/home/fl_logo.svg" alt="ФиЛнекст" width="150px" height="30px" class="mb-0">
                </div>
                <p class="mt-4">Юридическая компания «ФиЛнекст» специализируется на работе с долговыми обязательствами по всей России.</p>
            </div>
            <div class="lg:col-span-1">

            </div>
            <div class="lg:col-span-3">
                <div class="text-3xl font-semibold mb-2">Есть вопросы?</div>
                <ul class="space-y-3">
                    @foreach($contacts as $obItem)
                        <li>
                            @if(isset($obItem->url))
                                <a href="{{ $obItem->url }}" class="flex items-center">
                                    @svg($obItem->icon, 'w-6 h-6 shrink-0')
                                    <span class="ml-2">{{ $obItem->text }}</span>
                                </a>
                            @else
                                <span class="flex items-center">
                                    @svg($obItem->icon, 'w-6 h-6 shrink-0')
                                    <span class="ml-2">{{ $obItem->text }}</span>
                                </span>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <hr class="my-6 border-blueGray-300">
        <p class="text-center mt-6">Copyright © 2017 - {{ \Carbon\Carbon::now()->format('Y')  }}. Все права защищены компанией Альбус</p>
    </div>
</footer>
