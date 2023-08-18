@extends('layouts.app')

@section('content')

    <section class="hero-section relative" id="home">
        <img class="absolute w-full h-full object-cover object-center z-[-2]" src="images/home/hero2.webp">
        <div class="absolute bg-black/60 inset-0 z-[-1]"></div>
            <div class="container flex justify-end py-20">
                <div class="w-1/2">
                    <div class="border-l boder-[#ffffff33] relative after:absolute after:h-1/2 after:bottom-0 after:left-0 after:-translate-x-[1px] after:w-[3px] after:bg-primary ">
                        <h2 class="text-white text-5xl font-semibold font-serif px-6 py-4">Коллекторское Агентство<br>"ФиЛнекст"</h2>
                    </div>
                </div>
            </div>
        </li>
    </section>

    @php
        $arActions = [
            [
                'title' => 'Банк',
                'description' => 'Приобретение долгов у банка и дальнейшее их погашение должниками',
                'icon' => 'images/home/bank.svg'
            ],
            [
                'title' => 'Микрозаймы',
                'description' => 'Разрешение долговых вопросов перед микрофинасовыми организациями',
                'icon' => 'images/home/loan.svg'
            ],
        ]
    @endphp

    <section class="offer">
        <div class="container">
            <div class="grid grid-cols-3 gap-10 pb-10">
                <div class="shadow-out relative">
                    <h2 class="absolute w-full py-3 bg-primary text-white text-center text-3xl font-serif font-semibold bottom-full rounded-t-xl">Обратная связь</h2>
                    <form class="grid grid-cols-1 gap-6 p-8">
                        <input type="text" name="Имя" placeholder="Имя" class="w-full form-control">
                        <input type="tel" name="Телефон" placeholder="Телефон" class="w-full form-control">
                        <textarea name="Сообщение" placeholder="Сообщение" class="w-full form-control" rows="3"></textarea>
                        <button type="submit" data-attach-loading="" class="mt-2 btn btn-primary">Отправить</button>
                    </form>
                </div>
                <div class="col-span-2 flex items-center justify-center">
                    <div class="grid grid-cols-2 gap-10">
                        @foreach($arActions as $obAction)
                            <div class="flex" data-aos-delay="{{ $loop->iteration * 100 }}" data-aos="fade-up">
                                <div class="shrink-0 self-start bg-primary-200 rounded-full p-4 mr-4">
                                    <img class="overflow-hidden rounded-full" src="{{ $obAction['icon'] }}" alt="{{ $obAction['title'] }}" width="50px" height="50px">
                                </div>
                                <div class="media-body pl-4">
                                    <h3 class="text-3xl font-medium font-serif mb-2">{{ $obAction['title'] }}</h3>
                                    <p>{{ $obAction['description'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about-section relative" id="about">
        <img class="absolute w-full h-full object-cover object-center z-[-2]" src="images/home/counter.jpg">
        <div class="absolute bg-black/20 inset-0 z-[-1]"></div>
        <div class="container py-12 text-white">
            <div data-aos-delay="100" data-aos="fade-up">
                <span class="section_subtitle">Информация о нашей компании</span>
                <h2 class="font-serif text-3xl mb-4">О нас</h2>
            </div>
            <div class="text-white">
                <h4 class="text-2xl font-serif mb-4">ООО «ФиЛнекст» — это организация, основным видом деятельности которой является деятельность по возврату просроченной задолженности</h4>
                <p>Такой тип деятельности регулируется Федеральным законом от 03.07.2016 года № 230 ФЗ и Гражданским кодексом.</p>
                <p>В соответствии с законом, мы вправе:</p>
                <ul class="checklist mt-2 space-y-3">
                    <li>Приобретать право требования просроченной задолженности с должника (купить ваш долг по договору цессии);Оказывать услуги кредиторам по возврату просроченной задолженности (работа по агентскому договору);</li>
                    <li>В рамках выполнения первых двух пунктов, мы вправе встречаться лично с должником, общаться по телефону, направлять сообщения (телеграфные, текстовые, голосовые), посылать письма, общаться с третьими лицами, обращаться в судебные органы, в службу судебных приставов, органы МВД (в случае признаков мошенничества) и др.</li>
                </ul>
            </div>
        </div>
    </section>

    @php
        $arServices = [
            [
                'title' => 'Взыскание задолженностей',
                'description' => 'Банки и другие финансовые организации сталкиваются с проблемой несвоевременного внесения заемщиками очередных платежей по кредитным обязательствам. Мы можем помочь!',
                'icon' => 'heroicon-o-banknotes',
                'advantages' => [
                    'Быстро',
                    'В рамках правового поля',
                    'Гарантированно'
                ]
            ],
            [
                'title' => 'Реализация залогового имущества',
                'description' => 'Продажа залогового имущества осуществляется в короткие сроки и по оптимальным ценам.',
                'icon' => 'heroicon-s-home',
            ],
            [
                'title' => 'Покупка долгов',
                'description' => 'Банки и другие финансовые организации сталкиваются с проблемой несвоевременного внесения заемщиками очередных платежей по кредитным обязательствам. Мы можем помочь!',
                'icon' => 'heroicon-s-magnifying-glass-circle',
                'advantages' => [
                    'Отсутствие затрат на самостоятельную организацию возврата задолженности',
                    'Возможность быстрого получения оборотных средств и их реинвестирования',
                    'Фокусирование усилий на профильном бизнесе'
                ]
            ],
        ]
    @endphp

    <section class="bg-gray-50" id="services">
        <div class="container py-12">
            <header class="text-center mb-8">
                <div>Направления нашей компании</div>
                <h2 class="text-4xl font-serif">Основные направления деятельности</h2>
            </header>
            <div class="grid md:grid-cols-3 gap-10">
                @foreach($arServices as $obService)
                    <div class="group">
                        <div class="relative flex justify-center">
                            @if($loop->iteration < 3)
                                <div class="max-md:hidden absolute h-[1px] top-1/2 translate-x-1/2 w-full bg-stone-300"></div>
                            @endif
                            <div class="self-center inline-flex relative bg-white rounded-full shadow-round p-6 mb-4" data-aos-delay="{{ $loop->iteration * 100 }}" data-aos="fade-up">
                                @svg($obService['icon'], 'w-20 h-20 text-primary')
                                <span class="absolute flex items-center justify-center bg-primary text-white font-medium h-8 w-8 top-0 right-2 rounded-full p-1 shadow-round">
                                    {{ $loop->iteration  }}
                                </span>
                            </div>
                        </div>
                        <h3 class="text-3xl font-serif mb-4" data-aos-delay="{{ $loop->iteration * 100 }}" data-aos="fade-down">{{ $obService['title'] }}</h3>
                        <p>{{ $obService['description'] }}</p>
                        @if(isset($obService['advantages']))
                            <ul class="checklist mt-4">
                            @foreach($obService['advantages'] as $advantage)
                                <li>{{ $advantage }}</li>
                            @endforeach
                            </ul>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="relative bg-fixed bg-cover bg-center isolate" style="background-image: url(images/home/conditions.png);" id="payment">
        <div class="absolute bg-black/60 inset-0 z-[-1]"></div>

        <div class="container py-20 text-white">
            <header class="mb-8">
                <div>Интересные условия для должников</div>
                <h2 class="text-4xl font-serif">Оплата</h2>
            </header>

            <div class="">
                <p class="mb-4">ООО «ФиЛнекст» всегда лояльно к должникам, которые осознают свою обязанность по погашению задолженности. Поэтому ООО «ФиЛнекст» предлагает таким гражданам следующие интересные для них условия:</p>
                <ul class="checklist space-y-3 mb-2 ">
                    <li>Заключение мирового соглашения (утверждается судом);</li>
                    <li>Рассрочка;</li>
                    <li>Частичное прощение;</li>
                    <li>Погашение долга имуществом.</li>
                </ul>
                <p class="mb-2">Применение данных условий индивидуально для каждого должника и оговаривается персонально.</p>
                <p class="mb-2">Указанные условия могут быть применимы как самостоятельно, так и несколько сразу. Например, мы можем часть долга простить, а на оставшуюся часть дать разумную рассрочку.</p>
                <p class="mb-2">ООО «ФиЛнекст» всегда готово вам помочь в решении проблем с долгами.</p>
            </div>
        </div>
    </section>

    @php
        $arFaq = [
            [
                'question' => 'Легальна ли коллекторская деятельность?',
                'ansver' => 'Да легальна. В 2017 году в силу вступил федеральный закон «О защите прав и законных интересов физических лиц при осуществлении деятельности по возврату просроченной задолженности и о внесении изменений в Федеральный закон «О микрофинансовой деятельности». Этот закон был призван навести порядок на рынке взыскания и установить четкие требования по отношению к участникам этого процесса.',
            ],
            [
                'question' => 'Что такое цессия?',
                'ansver' => '<p>Цессия — это гражданско-правовой договор, в соответствии с которым право (требование), принадлежащее на основании обязательства кредитору, может быть передано им другому лицу по сделке (уступка требования) или может перейти к другому лицу на основании закона. Для перехода к другому лицу прав кредитора не требуется согласие должника.</p>
                    <p>В соответствии с Гражданским кодексом, уведомление должника о переходе права имеет для него силу независимо от того, первоначальным или новым кредитором оно направлено.</p>
                    <p>Право первоначального кредитора переходит к новому кредитору в том объеме и на тех условиях, которые существовали к моменту перехода права. В частности, к новому кредитору переходят права, обеспечивающие исполнение обязательства (поручительство, залог и т. п.), а также другие связанные с требованием права, в том числе право на проценты.</p>
                    <p>Если вы получили уведомление о том, что ООО «ФиЛнекст» является вашим кредитором, то можете не сомневаться, что данное право мы получили на законных основаниях.</p>',
            ],
            [
                'question' => 'Легальна ли коллекторская деятельность?',
                'ansver' => 'Да легальна. В 2017 году в силу вступил федеральный закон «О защите прав и законных интересов физических лиц при осуществлении деятельности по возврату просроченной задолженности и о внесении изменений в Федеральный закон «О микрофинансовой деятельности». Этот закон был призван навести порядок на рынке взыскания и установить четкие требования по отношению к участникам этого процесса.',
            ],
        ]
    @endphp

    <section class="bg-gray-50" id="faq">
        <div class="container py-12">
            <header class="mb-8">
                <h2 class="text-4xl font-serif">Часто задаваемые вопросы</h2>
            </header>
            <div class="accordion border border-neutral-200 rounded-xl" data-lazy="accordion">
                @foreach ($arFaq as $obItem)
                <div class="accordion-item bg-white">
                    <button class="group w-full border-y {{ $loop->iteration == 1 ? 'active' : '' }}" type="button" data-action="toggle" data-target="#faq_{{ $loop->iteration }}">
                        <span class="flex py-4 px-4 font-serif font-medium text-lg group-[.active]:bg-primary-100 group-[.active]:text-primary-900">
                            {{ $obItem['question'] }}
                        </span>
                    </button>
                    <div id="faq_{{ $loop->iteration }}" class="accordion-content {{ $loop->iteration == 1 ? 'open' : '' }}">
                        <div class="p-4 prose-lg">
                            {!! $obItem['ansver'] !!}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="relative bg-fixed bg-cover bg-center isolate" style="background-image: url('images/home/contacts.jpg');" id="contacts">
        <div class="absolute bg-black/80 inset-0 z-[-1]"></div>

        <div class="container py-12">
            <header class="mb-8  text-white">
                <h2 class="text-4xl font-serif">Контакты</h2>
            </header>
            <div class="grid grid-cols-2 gap-20">
                <div>
                    <div class="bg-[#f6f4ed] rounded-lg overflow-hidden p-8">
                        <h3 class="text-3xl font-serif font-medium mb-4">Обратная связь</h3>

                        <form class="grid grid-cols-1 gap-4">
                            <input type="text" name="Имя" placeholder="Имя" class="w-full form-control">
                            <input type="tel" name="Телефон" placeholder="Телефон" class="w-full form-control">
                            <textarea name="Сообщение" placeholder="Сообщение" class="w-full form-control" rows="3"></textarea>
                            <button type="submit" data-attach-loading="" class="mt-2 btn btn-primary">Отправить</button>
                        </form>
                    </div>
                </div>
                <div>
                    <div class="bg-[#f6f4ed] rounded-lg overflow-hidden">
                        <div class="p-8">
                            <h3 class="text-3xl font-serif font-medium mb-4">Реквизиты</h3>
                            <table class="requisites table-auto">
                                <tbody>
                                    <tr><th scope="row">Наименование</th> <td>ООО «ФиЛнекст»</td></tr>
                                    <tr><th scope="row">ИНН/КПП</th> <td>6165226716 / 616501001</td> </tr>
                                    <tr><th scope="row">ОГРН</th> <td>1206100031928</td> </tr>
                                    <tr><th scope="row">Юридический адрес</th> <td>344 038, г. Ростов-на-Дону, ул. Нансена 103/1, оф.1</td> </tr>
                                    <tr><th scope="row">Банковские реквизиты</th> <td>АО "ТИНЬКОФФ БАНК"</td> </tr>
                                    <tr><th scope="row">Р/сч:</th> <td>40702810810000707120</td> </tr>
                                    <tr><th scope="row">К/сч</th> <td>30101810145250000974</td> </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="grid grid-cols-2 text-primary-900 border-t border-slate-300">
                            <button class="flex items-center justify-center py-4 transition-all hover:bg-primary hover:text-white" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <x-heroicon-o-clipboard-document-list class="w-8 h-8 shrink-0"/>
                                <span class="text-xl ml-4">Посмотреть все</span>
                            </button>

                            <button class="flex items-center justify-center py-4 transition-all hover:bg-primary hover:text-white" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <x-heroicon-o-qr-code class="w-8 h-8 shrink-0"/>
                                <span class="text-xl ml-4">Оплата по QR коду</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
