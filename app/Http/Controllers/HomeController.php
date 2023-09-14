<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $this->page->description('Юридическая компания «ФиЛнекст» в Ростове-на-Дону специализируется на работе с долговыми обязательствами по всей России.')
            ->keywords('ФиЛнекст, ФиЛнекст Ростов-на-Дону, ФиЛнекст Россиия, юридическая компания')
            ->cover('images/home/hero2.webp');
        return view('home');
    }
}
