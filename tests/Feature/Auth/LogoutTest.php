<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LogoutTest extends TestCase
{
    use RefreshDatabase;

    public function test_cannot_view_logout_page()
    {
        $this->get(route('logout'))->assertStatus(405);
    }

    public function test_authenticated_user_can_be_logged_out()
    {
        $this->signIn();

        $this->post('logout')
            ->assertRedirect(route('welcome'));

        $this->assertFalse(Auth::check());
    }
}
