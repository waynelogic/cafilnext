<?php

use Illuminate\Support\Facades\Route;
use App\Helpers\Page;
use App\Http\Controllers\LeadController;
use Spatie\Sitemap\SitemapGenerator;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $page = new Page();
    $page->description('Юридическая компания «ФиЛнекст» специализируется на работе с долговыми обязательствами по всей России.');
    $page->keywords('ФиЛнекст, ФиЛнекст Ростов-на-Дону, ФиЛнекст Россиия, юридическая компания');
    $page->cover('images/home/hero2.webp');

    return view('home',  ['page' => $page]);
})->name('home');

Route::get('generate-sitemap', function () {
    SitemapGenerator::create('https://cafilnext.ru/')
        ->writeToFile(public_path('sitemap.xml'));
});


Route::get('/mail', function () {
    $lead = \App\Models\FormRecord::find(4);

    return view('mail/newlead',  ['lead' => $lead]);
})->name('home');


Route::prefix('api')->group(function () {
    Route::post('/contactForm',[LeadController::class,'contactForm'])->name('contactForm');
});
