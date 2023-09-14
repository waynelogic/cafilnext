<?php namespace Waynelogic\Corporate\Models;

class Department extends Model
{
    public $table = 'corp_departments';

    protected $casts = [
        'phone' => 'array',
        'email' => 'array',
    ];
}
