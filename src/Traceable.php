<?php

namespace Tingo\Traceable;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Tingo\Traceable\Models\Trace;

trait Traceable
{
    /**
     * Get all traces.
     *
     * @return MorphMany
     */
    public function traces(): MorphMany
    {
        return $this->morphMany(Trace::class, 'traceable');
    }

    /**
     * Create new trace.
     *
     * @param Creator $creator
     * @param string $title
     * @param string $description
     * @return Model
     */
    public function createTrace(Creator $creator, string $title, string $description): Model
    {
        return $this->traces()->create([
            'title' => $title,
            'description' => $description,
            'creator_email' => $creator->getCreatorEmail(),
            'creator_name' => $creator->getCreatorName(),
        ]);
    }
}