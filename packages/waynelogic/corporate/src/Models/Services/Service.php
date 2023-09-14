<?php

namespace Waynelogic\Corporate\Models\Services;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Waynelogic\Corporate\Models\ImageModel;

class Service extends ImageModel
{
    protected $table = 'corp_services';

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
