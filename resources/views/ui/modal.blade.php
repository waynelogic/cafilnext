<dialog id="{{ $id }}" class="rounded-xl z-50 backdrop:bg-black/50">
    <div class="modal-header flex items-center justify-between border-b border-gray-400 p-4">
        <h5 class="text-2xl font-semibold">{{ isset($title) ? $title : 'Информация' }}</h5>
        <form method="dialog" class="flex items-center ml-2">
            <button>
                <x-heroicon-o-x-mark class="w-6 h-6"/>
            </button>
        </form>
    </div>
    <div class="p-6">
        {{ $slot }}
    </div>
    <div class="modal-header flex items-center justify-end border-t border-gray-400 p-4">
        <form method="dialog">
            <button class="btn btn-primary">
                Закрыть
            </button>
        </form>
    </div>
</dialog>
