<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;
use Waynelogic\Corporate\Cms\Page;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public $page;

    public function __construct() {
        $this->page = Page::make();
        View::share('page', $this->page);
        View::share('header_navbar', $this->getHeaderNavbar());
        View::share('contacts', $this->getContacts());
        View::share('requisites', $this->getRequisites());
    }

    private function getHeaderNavbar()
    {
        return [
            (object) [
                'title' => 'Главная',
                'url' => '#home'
            ],
            (object) [
                'title' => 'О нас',
                'url' => '#about'
            ],
            (object) [
                'title' => 'Деятельность',
                'url' => '#services'
            ],
            (object) [
                'title' => 'Оплата',
                'url' => '#payment'
            ],
            (object) [
                'title' => 'Вопросы',
                'url' => '#faq'
            ],
            (object) [
                'title' => 'Контакты',
                'url' => '#contacts'
            ],
        ];
    }

    private function getContacts()
    {
        return (object) [
            'phone' => (object) [
                'text' => '+7 991 851 02 02',
                'url' => 'tel://+79918510202',
                'icon' => 'heroicon-s-phone'
            ],
            'address' => (object) [
                'text' => 'г. Ростов-На-Дону, ул Нансена, здание 103М, помещение 5',
                'url' => 'https://yandex.ru/profile/-/CDUQm6Yx',
                'icon' => 'heroicon-s-map-pin'
            ],
            'email' => (object) [
                'text' => 'ca@filnext.ru',
                'url' => 'mailto:ca@filnext.ru',
                'icon' => 'heroicon-s-envelope'
            ],
        ];
    }

    private function getRequisites() {
        return [
            (object) [
                'title' => 'Директор',
                'text' => 'Филоненко Юрий Сергеевич',
            ],

            (object) [
                'title' => 'Полное наименование',
                'text' => 'Общество с ограниченной ответственностью «ФиЛнекст»',
            ],
            (object) [
                'title' => 'Сокращенное наименование',
                'text' => 'ООО «ФиЛнекст»',
            ],
            (object) [
                'title' => 'ИНН/КПП',
                'text' => '6165226716 / 616501001',
            ],
            (object) [
                'title' => 'ОГРН',
                'text' => '1206100031928',
            ],
            (object) [
                'title' => 'ОКВЭД',
                'text' => '82.91',
            ],

            (object) [
                'title' => 'Юридический адрес',
                'text' => '344 038, г. Ростов-на-Дону, здание 103М, помещение 5',
            ],

            (object) [
                'title' => 'Фактический адрес',
                'text' => '344 038, г. Ростов-на-Дону, здание 103М, помещение 5',
            ],

            (object) [
                'title' => 'Абонентский ящик',
                'text' => '344 000 , г Ростов на Дону, а/я 210, Филоненко Ю. С.',
            ],
            (object) [
                'title' => 'Телефон',
                'text' => '	8 800 1000-761, +7 (961) 301-00-66',
            ],
            (object) [
                'title' => 'Банк',
                'text' => '	АО "ТИНЬКОФФ БАНК"',
            ],
            (object) [
                'title' => 'Р/сч',
                'text' => '40702810810000707120',
            ],
            (object) [
                'title' => 'К/сч',
                'text' => '30101810145250000974',
            ],
        ];
    }


}
