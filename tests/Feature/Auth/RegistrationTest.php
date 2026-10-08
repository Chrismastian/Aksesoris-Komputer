<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;

class RegistrationTest extends TestCase
{
    /**
     * Public registration is disabled on purpose: only the seeded admin
     * account may reach the admin panel, so the storefront cannot be used
     * to self-register into it. This test guards that decision.
     */
    public function test_registration_is_disabled(): void
    {
        $this->get('/register')->assertNotFound();

        $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ])->assertNotFound();
    }
}
