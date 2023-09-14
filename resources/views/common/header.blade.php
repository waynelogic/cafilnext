<header class="fixed text-white w-full top-0 py-3 bg-[#181f29]/80 backdrop-blur-[20px] backdrop-saturate-[180%] shadow-md z-50" id="site-header">
    <div class="container flex max-xl:flex-wrap items-center">
        <img src="images/home/fl_logo.svg" alt="ФиЛнекст" width="200px" height="40px" class="mb-0 max-w-sm mr-10">
        <nav class="site-navbar max-xl:w-full max-xl:order-last max-lg:w-full inset-0 max-lg:order-last ">
            <ul class="flex items-center max-lg:flex-col max-lg:mt-2 max-lg:space-y-2">
                @foreach($header_navbar as $menuItem)
                    <li class="max-lg:w-full">
                        <a class="max-lg:w-full inline-flex text-lg px-3 py-2 max-lg:border rounded-lg"
                           href="{{ $menuItem->url }}">{{ $menuItem->title }}</a>
                    </li>
                @endforeach
            </ul>
        </nav>
        <a href="{{ $contacts->phone->url }}" class="max-md:hidden ml-auto shrink-0 font-bold md:text-xl flex items-center duration-300 hover:text-primary">{{ $contacts->phone->text }}</a>
        <button data-action="toggle-menu" class="max-md:ml-auto xl:hidden px-4 py-2">
            <x-heroicon-o-bars-4 class="w-8 h-8"/>
        </button>
    </div>
</header>

