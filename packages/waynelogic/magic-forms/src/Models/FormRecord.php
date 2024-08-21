<?php

namespace Waynelogic\MagicForms\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use Waynelogic\MagicForms\Mail\ContactFormAdmin;
class FormRecord extends Model
{
    use HasFactory;
    protected $casts  = [
        'form_data' => 'array',
        'unread' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function($model) {
//            $model->setGeoData();
        });

        static::created(function($model) {
           $model->sendToAdmin();
        });
    }

    public function read(): void
    {
        $this->unread = false;
        $this->save();
    }

    public function sendToAdmin()
    {
        $admins = config('magic-forms.admins');
        foreach ($admins as $admin) {
            if (!isset($admin['email'])) {
                continue;
            }
            Mail::to($admin['email'])->queue(new ContactFormAdmin($this));
        }
    }

    public function setGeoData(): void
    {
        $this->ip ?: $this->ip = request()->ip();
        $ipData = json_decode(file_get_contents("https://ipinfo.io/{$this->ip}"));
        $this->city = $ipData->city ?? null;
        $this->country = $ipData->country ?? null;
    }
}
