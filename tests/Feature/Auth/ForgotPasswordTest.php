<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;
use App\Models\User;
use Livewire\Livewire;
use App\Http\Livewire\Auth\ForgotPassword;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ForgotPasswordTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_visit_forgot_password_page()
    {
        $this->get(route('password.email'))->assertOk();
    }

    public function test_livewire_component_is_present()
    {
        $this->get(route('password.email'))->assertSeeLivewire('auth.forgot-password');
    }

    public function test_is_redirected_if_logged_in()
    {
        $this->signIn();

        $this->get(route('password.email'))->assertRedirect(route('dashboard'));
    }

    public function test_email_is_required()
    {
        Livewire::test(ForgotPassword::class)
            ->set('email', '')
            ->call('attempt')
            ->assertHasErrors(['email' => [
                'required'
            ]]);
    }

    public function test_email_must_exist()
    {
        Livewire::test(ForgotPassword::class)
            ->set('email', 'not-a-registered-email@email.com')
            ->call('attempt')
            ->assertHasErrors();
    }

    public function test_a_valid_email_will_succeed()
    {
        $user = User::factory()->create();

        Livewire::test(ForgotPassword::class)
            ->set('email', $user->email)
            ->call('attempt')
            ->assertHasNoErrors()
            ->assertSee('Password reset email sent');
    }

    public function test_a_valid_email_address_will_get_sent_an_email()
    {
        $user = User::factory()->create();

        Livewire::test('auth.forgot-password')
            ->set('email', $user->email)
            ->call('attempt');

        $this->assertDatabaseHas('password_resets', [
            'email' => $user->email,
        ]);
    }
}
