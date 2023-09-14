<?php

namespace Waynelogic\MagicForms\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Routing\Controller as BaseController;
use Waynelogic\MagicForms\Mail\ContactFormAdmin;
use Waynelogic\MagicForms\Models\FormRecord;
class MagicFormsController extends BaseController
{
    public function index(Request  $request) {
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

        $adminEmail = env('MAGIC_FORMS_EMAIL');

        if (!empty($adminEmail)) {
            Mail::to($adminEmail)->send(new ContactFormAdmin($formRecord));
        }


        return true;
    }

    public function test() {
        return view('magic-forms::contact-admin', [
            'formRecord' => FormRecord::first()
        ]);
    }
}
