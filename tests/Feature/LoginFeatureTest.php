<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginFeatureTest extends TestCase
{
    /**
     * Test if the login page is accessible and contains the login button.
     */
    public function test_login_page_displays_login_button(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
        $response->assertSee('Login'); // Assumes your button contains the text "Login"
    }
}
