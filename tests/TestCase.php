<?php

namespace Tingo\Traceable\Tests;

use Tingo\Traceable\Tests\Models\Entity;
use Tingo\Traceable\TraceableServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    /**
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        // additional setup
    }

    /**
     * @param $app
     * @return string[]
     */
    protected function getPackageProviders($app): array
    {
        return [
            TraceableServiceProvider::class,
        ];
    }

    /**
     * @param $app
     * @return void
     */
    protected function getEnvironmentSetUp($app): void
    {
        $traces = require __DIR__ . '/../database/migrations/2023_01_09_080439_create_traces_table.php';
        if (is_object($traces)) {
            $traces->up();
        }
        $entities = require __DIR__ . '/../database/migrations/2023_01_09_080000_create_entities_table.php';
        if (is_object($entities)) {
            $entities->up();
        }
        $users = require __DIR__ . '/../database/migrations/2023_01_09_080000_create_users_table.php';
        if (is_object($users)) {
            $users->up();
        }
    }

    /**
     * @return Entity
     */
    public function createTestEntity(): Entity
    {
        return Entity::create([
            'name' => 'Foo entity',
            'category' => 'foo',
            'description' => 'This is an awesome entity!',
            'unit' => 'pounds',
            'price' => 25.50
        ]);
    }
}