<?php

namespace Tingo\Traceable\Tests\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tingo\Traceable\Creator;
use Tingo\Traceable\Tests\Factories\UserFactory;

class User extends Model implements Creator
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'first_name',
        'last_name',
    ];


    /**
     * @return string
     */
    public function getCreatorEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getCreatorName(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }
    
    /**
     * Create a new factory instance for the model.
     *
     * @return Factory
     */
    protected static function newFactory(): Factory
    {
        return UserFactory::new();
    }
}