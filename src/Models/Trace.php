<?php

namespace Tingo\Traceable\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Trace extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'creator_email',
        'creator_name',
    ];

    /**
     * Get the owning traceable model.
     */
    public function traceable(): MorphTo
    {
        return $this->morphTo();
    }
}
