<?php

namespace Waynelogic\Corporate\Models\Services;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Waynelogic\Corporate\Models\ImageModel;

class Category extends ImageModel
{
    protected $table = 'corp_services_categories';

    public function children(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function services(): HasMany
    {
        return $this->hasMany(Service::class);
    }

    public function getUrlAttribute($category) {
        return route('services.category', ['category' => $category]);
    }
}
