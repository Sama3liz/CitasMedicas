<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_seeders_can_be_created()
    {
        $response = $this->seed();
        $this->assertDatabaseHas('users', [
            'email' => 'dev@dev.com',
        ]);
    }
}
