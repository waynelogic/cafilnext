@extends('layouts.app')

@section('content')

    <section class="relative hero-section text-white isolate content-section" id="home">
        <x-image class="absolute w-full h-full object-cover object-[center_top] z-[-1]" src="images/home/large_background.jpg" w="1920" h="1080" alt="ФиЛнекст"></x-image>
        <div class="container py-32 pt-48">
            <div class="lg:w-5/6">
                <h2 class="relative text-4xl md:text-5xl lg:text-6xl lg:leading-[5rem] font-bold uppercase after:absolute after:-top-12 after:-left-20 after:bg-primary after:w-36 after:h-36 after:z-[-1] ">Коллекторское Агентство <br>"ФиЛнекст"</h2>
                <p class="text-3xl mt-2">
                    Юридическая компания «ФиЛнекст» специализируется на работе с долговыми обязательствами по всей России.
                </p>
                <a href="#about" class="btn btn-outline uppercase mt-5">
                    О нас
                </a>
            </div>
        </div>
    </section>

    @php
        $arActions = [
            (object) [
                'title' => 'Банк',
                'description' => 'Приобретение долгов у банка и дальнейшее их погашение должниками',
                'icon' => 'heroicon-o-building-library',
                'image' => 'images/home/bank.svg'
            ],
            (object) [
                'title' => 'Микрозаймы',
                'description' => 'Разрешение долговых вопросов перед микрофинасовыми организациями',
                'icon' => 'heroicon-o-banknotes',
                'image' => 'images/home/loan.svg'
            ],
        ]
    @endphp

    <section class="">
        <div class="container">
            <div class="grid lg:grid-cols-2 gap-10">
                <div>
                    <div class="shadow-out relative">
                        <h2 class="absolute w-full py-3 bg-primary text-white text-center text-3xl font-semibold bottom-full rounded-t-xl">Обратная связь</h2>
                        <form class="grid grid-cols-1 gap-6 p-8 border-2 rounded-b-xl" method="POST" data-request="{{ route('magic-forms') }}">
                            @csrf
                            <input type="hidden" name="group" value="Быстрая связь">
                            <input type="text" name="Имя" placeholder="Имя" required class="w-full form-control">
                            <input type="tel" name="Телефон" placeholder="Телефон" required class="w-full form-control">
                            <textarea name="Сообщение" placeholder="Сообщение" class="w-full form-control" rows="3"></textarea>
                            <button type="submit" data-attach-loading="" class="mt-2 btn btn-primary">Отправить</button>
                        </form>
                    </div>
                </div>
                <div class="flex flex-col justify-center">
                    <div class="grid gap-10">
                        @foreach($arActions as $obAction)
                            <div class="flex" data-aos-delay="{{ $loop->iteration * 100 }}" data-aos="fade-up">
                                <div class="shrink-0 self-start bg-primary-200 rounded-full p-4 mr-4">
                                    <x-image class="overflow-hidden rounded-full" src="{{ $obAction->image }}" w="50" h="50" alt="{{ $obAction->title }}"></x-image>
                                </div>
                                <div class="media-body pl-4">
                                    <h3 class="text-3xl font-semibold mb-2">{{ $obAction->title }}</h3>
                                    <p class="text-lg">{{ $obAction->description }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="abouts-section content-section" id="about">
        <div class="container grid lg:grid-cols-2 gap-10 lg:gap-20 py-12">
            <div>
                <div class="h-1 bg-gray-200 rounded overflow-hidden mb-4">
                    <div class="w-24 h-full bg-primary"></div>
                </div>
                <div class="prose-lg prose-ul:p-0 prose-p:mb-3 prose-p:mt-0">
                    <h2 class="text-4xl font-semibold mb-4">Информация о нашей <span class="text-primary">компании</span></h2>
                    <p>ООО ПКО «ФиЛнекст» — это организация, основным видом деятельности которой является деятельность по возврату просроченной задолженности.</p>
                    <p>Такой тип деятельности регулируется Федеральным законом от 03.07.2016 года № 230 ФЗ и Гражданским кодексом.<br> В соответствии с законом, мы вправе:</p>
                    <ul class="checklist mt-2 space-y-3">
                        <li>Приобретать право требования просроченной задолженности с должника (купить ваш долг по договору цессии);Оказывать услуги кредиторам по возврату просроченной задолженности (работа по агентскому договору);</li>
                        <li>В рамках выполнения первых двух пунктов, мы вправе встречаться лично с должником, общаться по телефону, направлять сообщения (телеграфные, текстовые, голосовые), посылать письма, общаться с третьими лицами, обращаться в судебные органы, в службу судебных приставов, органы МВД (в случае признаков мошенничества) и др.</li>
                    </ul>
                </div>
            </div>
            <div class="relative max-lg:h-64">
                <x-image class="absolute w-full h-full object-center object-cover rounded-3xl shadow-card" src="images/home/about-main-image.jpg" w="632" h="528" alt="О компании"></x-image>
            </div>
        </div>
    </section>

    @php
        $arServices = [
            (object) [
                'title' => 'Взыскание задолженностей',
                'description' => 'Банки и другие финансовые организации сталкиваются с проблемой несвоевременного внесения заемщиками очередных платежей по кредитным обязательствам. Мы можем помочь!',
                'icon' => 'heroicon-o-banknotes',
                'advantages' => [
                    'Быстро',
                    'В рамках правового поля',
                    'Гарантированно'
                ]
            ],
            (object) [
                'title' => 'Реализация залогового имущества',
                'description' => 'Продажа залогового имущества третьим лицам осуществляется в короткие сроки и по оптимальным ценам.',
                'icon' => 'heroicon-o-home',
            ],
            (object) [
                'title' => 'Покупка долгов',
                'description' => 'Банки и другие финансовые организации сталкиваются с проблемой несвоевременного внесения заемщиками очередных платежей по кредитным обязательствам. Мы можем помочь!',
                'icon' => 'heroicon-o-magnifying-glass-circle',
                'advantages' => [
                    'Отсутствие затрат на самостоятельную организацию возврата задолженности',
                    'Возможность быстрого получения оборотных средств и их реинвестирования',
                    'Фокусирование усилий на профильном бизнесе'
                ]
            ],
        ];
    @endphp

    <section class="services-section bg-gray-100 mt-12 content-section" id="services">
        <div class="container py-24">
            <div class="flex flex-col">
                <div class="h-1 bg-gray-200 rounded overflow-hidden">
                    <div class="w-24 h-full bg-primary"></div>
                </div>
                <div class="flex-wrap sm:flex-row flex-col py-6 ">
                    <p class="font-semibold">Направления нашей компании</p>
                    <h2 class="text-4xl font-semibold mb-4">Основные <span class="text-primary">направления</span> деятельности</h2>
                </div>
            </div>
            <div class="grid lg:grid-cols-3 gap-6">
                @foreach($arServices as $obService)
                    <div data-aos-delay="{{ $loop->iteration * 100 }}" data-aos="fade-down" class="group relative bg-white rounded-3xl overflow-hidden shadow-card hover:text-white isolate">
                        <div class="absolute w-full h-full duration-300 opacity-0 group-hover:opacity-80 bg-[linear-gradient(90deg,#b99566_11.32%,#6c573b_95.28%)] z-[-1] "></div>
                        <div class="p-10">
                            @svg($obService->icon, 'w-16 h-16 text-primary group-hover:text-white')
                            <h3 class="text-2xl xl:text-3xl font-semibold mt-4 mb-2">{{ $obService->title }}</h3>
                            <p class="text-lg">{{ $obService->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    @php
        $arPayements = [
            (object) [
                'title' => 'Заключение мирового соглашения',
                'icon' => 'heroicon-o-document-text'
            ],
            (object) [
                'title' => 'Рассрочка',
                'icon' => 'heroicon-o-clock'
            ],
            (object) [
                'title' => 'Частичное прощение',
                'icon' => 'heroicon-o-banknotes'
            ],
            (object) [
                'title' => 'Погашение долга имуществом',
                'icon' => 'heroicon-o-home'
            ],
        ];

    @endphp

    <section class="relative bg-fixed bg-cover bg-center isolate content-section" style="background-image: url(images/home/conditions.png);" id="payment">
        <div class="absolute bg-black/60 inset-0 z-[-1]"></div>

        <div class="container py-20 text-white">
            <header>
                <div class="h-1 bg-gray-200 rounded overflow-hidden">
                    <div class="w-24 h-full bg-primary"></div>
                </div>
                <div class="flex-wrap flex-col py-6 ">
                    <p class="text-lg">Интересные условия для должников</p>
                    <h2 class="text-4xl font-semibold mb-4">Оплата <span class="text-primary">задолженности</span></h2>
                </div>
            </header>

            <div class="prose-lg">
                <p class="mb-4">ООО ПКО «ФиЛнекст» всегда лояльно к должникам, которые осознают свою обязанность по погашению задолженности. Поэтому ООО ПКО «ФиЛнекст» предлагает таким гражданам следующие интересные для них условия:</p>
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-10">
                    @foreach($arPayements as $obItem)
                        <div class="flex items-center bg-white rounded-2xl p-4 text-main">
                            @svg($obItem->icon, 'w-10 h-10 text-primary')
                            <div class="font-semibold text-lg ml-4">{!! $obItem->title !!}</div>
                        </div>
                    @endforeach
                </div>
                <p class="mb-2">Применение данных условий индивидуально для каждого должника и оговаривается персонально.</p>
                <p class="mb-2">Указанные условия могут быть применимы как самостоятельно, так и несколько сразу. Например, мы можем часть долга простить, а на оставшуюся часть дать разумную рассрочку.</p>
                <p class="mb-2">ООО ПКО «ФиЛнекст» всегда готово вам помочь в решении проблем с долгами.</p>
            </div>
        </div>
    </section>

    @php
        $arFaq = [
            (object) [
                'question' => 'Легальна ли коллекторская деятельность?',
                'ansver' => 'Да легальна. В 2017 году в силу вступил федеральный закон «О защите прав и законных интересов физических лиц при осуществлении деятельности по возврату просроченной задолженности и о внесении изменений в Федеральный закон «О микрофинансовой деятельности». Этот закон был призван навести порядок на рынке взыскания и установить четкие требования по отношению к участникам этого процесса.',
            ],
            (object) [
                'question' => 'Что такое цессия?',
                'ansver' => '<p>Цессия — это гражданско-правовой договор, в соответствии с которым право (требование), принадлежащее на основании обязательства кредитору, может быть передано им другому лицу по сделке (уступка требования) или может перейти к другому лицу на основании закона. Для перехода к другому лицу прав кредитора не требуется согласие должника.</p>
                    <p>В соответствии с Гражданским кодексом, уведомление должника о переходе права имеет для него силу независимо от того, первоначальным или новым кредитором оно направлено.</p>
                    <p>Право первоначального кредитора переходит к новому кредитору в том объеме и на тех условиях, которые существовали к моменту перехода права. В частности, к новому кредитору переходят права, обеспечивающие исполнение обязательства (поручительство, залог и т. п.), а также другие связанные с требованием права, в том числе право на проценты.</p>
                    <p>Если вы получили уведомление о том, что ООО ПКО «ФиЛнекст» является вашим кредитором, то можете не сомневаться, что данное право мы получили на законных основаниях.</p>',
            ],
            (object) [
                'question' => 'Легальна ли коллекторская деятельность?',
                'ansver' => 'Да легальна. В 2017 году в силу вступил федеральный закон «О защите прав и законных интересов физических лиц при осуществлении деятельности по возврату просроченной задолженности и о внесении изменений в Федеральный закон «О микрофинансовой деятельности». Этот закон был призван навести порядок на рынке взыскания и установить четкие требования по отношению к участникам этого процесса.',
            ],
        ]
    @endphp

    <section class="bg-gray-50 content-section" id="faq">
        <div class="container py-12">
            <header>
                <div class="h-1 bg-gray-200 rounded overflow-hidden">
                    <div class="w-24 h-full bg-primary"></div>
                </div>
                <div class="flex-wrap flex-col py-6 ">
                    <h2 class="text-4xl font-semibold mb-4">Часто задаваемые <span class="text-primary">вопросы</span></h2>
                </div>
            </header>

            <div class="accordion flex flex-col space-y-5 mb-10">
                @foreach ($arFaq as $obItem)
                    <details class="accordion-item border border-primary rounded-xl overflow-hidden bg-white" {{ $loop->iteration == 1 ? 'open' : '' }}>
                        <summary>
                            <span>{{ $obItem->question }}</span>
                            <div class="duration-300 arrow">
                                <x-heroicon-o-chevron-down class="w-6 h-6"/>
                            </div>
                        </summary>
                        <div>
                            <div class="p-4 prose-lg border-primary">
                                {!! $obItem->ansver !!}
                            </div>
                        </div>
                    </details>
                @endforeach
            </div>
        </div>
    </section>

    <section class="relative bg-fixed bg-cover bg-center isolate content-section" style="background-image: url('images/home/contacts.jpg');" id="contacts">
        <div class="absolute bg-black/80 inset-0 z-[-1]"></div>

        <div class="container py-12">
            <header class="text-white">
                <div class="h-1 bg-gray-200 rounded overflow-hidden">
                    <div class="w-24 h-full bg-primary"></div>
                </div>
                <div class="flex-wrap flex-col py-6 ">
                    <p class="text-lg">Обратная связь и контактные даннные</p>
                    <h2 class="text-4xl font-semibold mb-4">Контакты</h2>
                </div>
            </header>
            <div class="grid lg:grid-cols-2 gap-10 lg:gap-20">
                <div>
                    <form class="flex flex-col h-full bg-[#f6f4ed] rounded-lg overflow-hidden p-4 lg:p-8" method="POST" data-request="{{ route('magic-forms') }}">
                        @csrf
                        <h3 class="text-4xl font-semibold mb-4">Обратная связь</h3>
                        <div class="flex flex-col space-y-4 mb-3">
                            <input type="hidden" name="group" value="Контакты">
                            <input type="text" name="Имя" placeholder="Имя" required class="w-full form-control">
                            <input type="tel" name="Телефон" placeholder="Телефон" required class="w-full form-control">
                            <input type="email" name="Почта" placeholder="Почта" class="w-full form-control">
                            <select name="Тема" class="w-full form-control">
                                <option selected>Общие вопросы</option>
                                <option>Оплата долга</option>
                                <option>Технический вопрос</option>
                                <option>Другое</option>
                            </select>
                            <textarea name="Сообщение" placeholder="Сообщение" class="w-full form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="mt-auto btn btn-primary">Отправить</button>
                    </form>
                </div>
                <div>
                    <div class="bg-[#f6f4ed] rounded-lg overflow-hidden">
                        <div class="p-4 lg:p-8">
                            <h3 class="text-4xl font-semibold mb-4">Реквизиты</h3>
                            <table class="requisites table-auto">
                                <tbody>
                                <tr><th scope="row">Наименование</th> <td>ООО ПКО «ФиЛнекст»</td></tr>
                                <tr><th scope="row">ИНН/КПП</th> <td>6165226716 / 616501001</td> </tr>
                                <tr><th scope="row">ОГРН</th> <td>1206100031928</td> </tr>
                                <tr><th scope="row">Юридический адрес</th> <td>344038, Ростовская область, г. Ростов-На-Дону, ул Нансена, здание 103М, помещение 5</td> </tr>
                                <tr><th scope="row">Банковские реквизиты</th> <td>АО "ТИНЬКОФФ БАНК"</td> </tr>
                                <tr><th scope="row">Р/сч:</th> <td>40702810810000707120</td> </tr>
                                <tr><th scope="row">К/сч</th> <td>30101810145250000974</td> </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="grid grid-cols-2 text-primary-900 border-t border-slate-300">
                            <button onclick="window['requisites-modal'].showModal();" class="flex items-center justify-center py-4 transition-all hover:bg-primary hover:text-white">
                                <x-heroicon-o-clipboard-document-list class="w-8 h-8 shrink-0"/>
                                <span class="text-sm lg:text-xl ml-4">Посмотреть все</span>
                            </button>

                            <button onclick="window['qr-modal'].showModal();" class="flex items-center justify-center py-4 transition-all hover:bg-primary hover:text-white" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <x-heroicon-o-qr-code class="w-8 h-8 shrink-0"/>
                                <span class="text-sm lg:text-xl ml-4">Оплата по QR коду</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-modal-window id="requisites-modal" view="ui.modal" title="Реквизиты организации">
        <table class="requisites table-auto">
            <thead>
                <tr>
                    <th class="border-b border-black" scope="col">Название</th>
                    <th class="border-b border-black" scope="col">Содержимое</th>
                </tr>
            </thead>
            <tbody>
                @foreach($requisites as $obItem)
                    <tr>
                        <th scope="row">{{ $obItem->title }}</th>
                        <td>{{ $obItem->text }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </x-modal-window>

    <x-modal-window id="qr-modal" view="ui.modal" title="Оплата по QR коду">
        <div class="flex justify-center">
            <x-image src="images/common/qr-pay.png" w="168" h="168" alt="QR"></x-image>
        </div>
    </x-modal-window>
@endsection
