<?php namespace Waynelogic\Corporate\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as BaseModel;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
class ImageModel extends BaseModel implements HasMedia
{
    use InteractsWithMedia;
    protected $guarded = ['id'];
}
