<?php namespace Waynelogic\Corporate\Models;

class Banner extends ImageModel
{
    protected $table = 'corp_banners';
    protected $casts = [
        'buttons' => 'array',
    ];
}
