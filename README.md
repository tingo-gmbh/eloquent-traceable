# Eloquent Traceable

Store traceable log items in your local database using Eloquent.

## Install

First install the latest version of our package.
```bash
composer require tingo-gmbh/eloquent-traceable
```

Next we publish the migration and config files.
```bash
php artisan vendor:publish --provider="Tingo\Traceable\TraceableServiceProvider" --tag="migrations"
```

## Usage

### Model
Add the Traceable trait to your Eloquent model and implement the Creator interface for your user.

```php
<?php

namespace Tingo\Traceable\Tests\Models;

use Illuminate\Database\Eloquent\Model;
use Tingo\Traceable\Traceable;

class Entity extends Model
{
    use Traceable;

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
    
    ...
}
```

```php
<?php

namespace Tingo\Traceable\Tests\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model implements Creator
{
    ...
    
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
}
```