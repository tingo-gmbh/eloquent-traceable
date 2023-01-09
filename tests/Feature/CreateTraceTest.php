<?php

namespace Tingo\Traceable\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tingo\Traceable\Tests\Models\User;
use Tingo\Traceable\Tests\TestCase;


class CreateTraceTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @group default
     */
    public function testSuccessfulWithLocale()
    {
        $user = User::factory()->create();
        $entity = $this->createTestEntity();
        $trace = $entity->createTrace($user, 'Creation', 'Has changed price of ' . $entity->name);
        $this->assertSame($trace->creator_name, $user->first_name . ' ' . $user->last_name);
    }
}