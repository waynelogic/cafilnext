<header>
    <div class="h-1 bg-gray-200 rounded overflow-hidden">
        <div class="w-24 h-full bg-primary"></div>
    </div>
    <div class="flex-wrap flex-col py-6 ">
        @isset($attributes['subtitle'])
        <p class="text-lg">{!! $attributes['subtitle'] !!}</p>
        @endisset
        <h2 class="text-4xl font-semibold mb-4">{!! $attributes['title'] !!}</h2>
    </div>
</header>
