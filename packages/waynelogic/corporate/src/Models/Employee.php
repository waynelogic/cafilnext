<?php namespace Waynelogic\Corporate\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;
class Employee extends ImageModel
{
    protected $table = 'corp_employees';

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class,  'department_id');
    }

    public static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub

        self::saving(function ($model) {
            $model->slug = Str::slug($model->getFullNameAttribute());
        });
    }

    public function getFullNameAttribute() {
        return implode(' ', [
            $this->last_name, $this->name, $this->middle_name
        ]);
    }
}
