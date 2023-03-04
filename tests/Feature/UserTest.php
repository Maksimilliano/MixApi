<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->migrateUsing();
    }

    /**
     * @test createUserTest
     * A basic feature create user test.
     */
    public function createUserTest(): void
    {
        $testEmail = 'test@email.com';

        User::factory()->create([
            'name' => 'Test User',
            'email' => $testEmail,
            'password' => '1232421312421',
        ]);

        $this->assertDatabaseCount('users', 1);
        $this->assertDatabaseHas('users', ['email' => $testEmail]);
    }
}
