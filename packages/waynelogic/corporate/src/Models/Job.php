<?php

namespace Waynelogic\Corporate\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Job extends Model
{
    protected $table = 'corp_jobs';

    protected $casts = [
        'published_at' => 'datetime'
    ];

    public static function getTypeOptions(): array
    {
        return [
            'constant' => 'Постоянная',
            'combination' => 'Возможно совщемщение',
            'freelancer' => 'Фриланс',
        ];
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class,  'department_id');
    }
}
