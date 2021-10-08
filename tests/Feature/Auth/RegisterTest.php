<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;
use Livewire\Livewire;
use App\Http\Livewire\Auth\Register;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_view_register_page()
    {
        $this->get(route('register'))->assertOk();
    }

    public function test_livewire_component_is_present()
    {
        $this->get(route('register'))->assertSeeLivewire('auth.register');
    }

    public function test_is_redirected_if_logged_in()
    {
        $this->signIn();

        $this->get(route('register'))->assertRedirect(route('dashboard'));
    }

    public function test_name_is_required()
    {
        Livewire::test(Register::class)
            ->set('name', '')
            ->set('email', 'user@email.com')
            ->set('password', 'password')
            ->set('password_confirmation', 'password')
            ->call('register')
            ->assertHasErrors(['name' => [
                'required'
            ]]);
    }

    public function test_email_is_required()
    {
        Livewire::test(Register::class)
            ->set('name', 'Luna')
            ->set('email', '')
            ->set('password', 'password')
            ->set('password_confirmation', 'password')
            ->call('register')
            ->assertHasErrors(['email' => [
                'required'
            ]]);
    }

    public function test_email_must_be_valid()
    {
        Livewire::test(Register::class)
            ->set('name', 'Luna')
            ->set('email', 'not-an-email')
            ->set('password', 'password')
            ->set('password_confirmation', 'password')
            ->call('register')
            ->assertHasErrors(['email' => [
                'email'
            ]]);
    }

    public function test_email_must_not_exist()
    {
        $existingUser = $this->signIn();

        Livewire::test(Register::class)
            ->set('name', 'Luna')
            ->set('email', $existingUser->email)
            ->set('password', 'password')
            ->set('password_confirmation', 'password')
            ->call('register')
            ->assertHasErrors(['email' => [
                'unique'
            ]]);
    }

    public function test_password_is_required()
    {
        Livewire::test(Register::class)
            ->set('name', 'Luna')
            ->set('email', 'user@email.com')
            ->set('password', '')
            ->set('password_confirmation', '')
            ->call('register')
            ->assertHasErrors(['password' => [
                'required'
            ]]);
    }

    public function test_password_confirmation_is_required()
    {
        Livewire::test(Register::class)
            ->set('name', 'Luna')
            ->set('email', 'user@email.com')
            ->set('password', 'password')
            ->set('password_confirmation', '')
            ->call('register')
            ->assertHasErrors(['password' => [
                'confirmed'
            ]]);
    }

    public function test_password_min_length_is_8_chars()
    {
        Livewire::test(Register::class)
            ->set('name', 'Luna')
            ->set('email', 'user@email.com')
            ->set('password', '1234567')
            ->set('password_confirmation', '1234567')
            ->call('register')
            ->assertHasErrors(['password' => [
                'min'
            ]]);
    }

    public function test_valid_credentials_can_register()
    {
        Livewire::test(Register::class)
            ->set('name', 'Luna')
            ->set('email', 'user@email.com')
            ->set('password', 'password')
            ->set('password_confirmation', 'password')
            ->call('register')
            ->assertHasNoErrors()
            ->assertRedirect(route('dashboard'));
    }

    public function test_registered_event_is_dispatched()
    {
        Event::fake();

        Livewire::test(Register::class)
            ->set('name', 'Luna')
            ->set('email', 'user@email.com')
            ->set('password', 'password')
            ->set('password_confirmation', 'password')
            ->call('register')
            ->assertRedirect(route('dashboard'));

        Event::assertDispatched(Registered::class);
    }
}
