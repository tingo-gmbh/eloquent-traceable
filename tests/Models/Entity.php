<?php

namespace Tingo\Traceable\Tests\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tingo\Traceable\Tests\Factories\EntityFactory;
use Tingo\Traceable\Traceable;

class Entity extends Model
{
    use HasFactory, Traceable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'category',
        'description',
        'unit',
        'price',
    ];

    /**
     * Create a new factory instance for the model.
     *
     * @return Factory
     */
    protected static function newFactory(): Factory
    {
        return EntityFactory::new();
    }
}