<?php

namespace Tingo\Traceable;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
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

    /**
     * Get string in case model has changed.
     *
     * @return string
     */
    public function getModelChangesDescription(): string
    {
        $filteredChanges = array_filter($this->getChanges(), function ($value, $key) {
            return !in_array($key, ['updated_at']);
        }, ARRAY_FILTER_USE_BOTH);

        if (count($filteredChanges) === 0) {
            return __('No changes');
        }

        $mappedChanges = Arr::map($filteredChanges, fn($value, $key) => $key . '=' . $value);
        return Str::limit(__('Changes') . ': ' . Arr::join($mappedChanges, ', '), 255);
    }
}