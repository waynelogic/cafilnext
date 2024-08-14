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
        $config = config('magic-forms');
        $formType = $request->header('form-type');
        $currentForm = $config['forms'][$formType] ?? null;

        $request->validate($currentForm['validation'] ?? [], [], $currentForm['attributes'] ?? []);

        $formData = $request->all();
        $record = new FormRecord();
        $record->group = $formData['group'] ?? null;
        unset($formData['group']);
        $record->form_data = $formData;
        $record->save();

        return response()->json(['success'=>'Form submitted successfully!']);
    }
}
