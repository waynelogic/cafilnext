<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormRecord;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactForm;

class LeadController extends Controller
{
    public function contactForm(Request $request): bool
    {
        $data = $request->all();
        unset($data['_token']);
        if (empty($data)) {
            return false;
        }
        $formRecord = new FormRecord();

        if (isset($data['group'])) {
            $formRecord->group = $data['group'];
            unset($data['group']);
        }
        $ipData = json_decode(file_get_contents('http://ipinfo.io/' . $request->ip()));

        $formRecord->form_data = $data;
        $formRecord->ip = $request->ip();
        if (isset($ipData->city)) {
            $formRecord->city = $ipData->city;
        }
        $formRecord->unread = true;
        $formRecord->save();
        Mail::to('info@albus-it.ru')->send(new ContactForm($formRecord));


        return true;
    }
}
