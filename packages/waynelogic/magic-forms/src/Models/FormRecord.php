<?php

namespace Waynelogic\MagicForms\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormRecord extends Model
{
    use HasFactory;

    protected $casts  = [
        'form_data' => 'array',
        'unread' => 'boolean',
    ];
}
