<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;
use App\Models\User;
use Livewire\Livewire;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Livewire\Auth\ForgotPassword;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ResetPasswordTest extends TestCase
{
    use RefreshDatabase;

    public function test_livewire_component_is_present()
    {
        $this->get(route('password.reset', ['token' => 'fake']))->assertSeeLivewire('auth.reset-password');
    }

    public function test_token_is_required()
    {
        Livewire::test('auth.reset-password', [
            'token' => null,
        ])
            ->call('resetPassword')
            ->assertHasErrors(['token' => 'required']);
    }

    public function test_email_is_required()
    {
        Livewire::test('auth.reset-password', [
            'token' => Str::random(16),
        ])
            ->set('email', null)
            ->call('resetPassword')
            ->assertHasErrors(['email' => 'required']);
    }

    public function test_email_must_be_valid()
    {
        Livewire::test('auth.reset-password', [
            'token' => Str::random(16),
        ])
            ->set('email', 'email')
            ->call('resetPassword')
            ->assertHasErrors(['email' => 'email']);
    }

    function test_password_is_required()
    {
        Livewire::test('auth.reset-password', [
            'token' => Str::random(16),
        ])
            ->set('new_password', '')
            ->call('resetPassword')
            ->assertHasErrors(['new_password' => 'required']);
    }

    function test_password_confirmation_is_required()
    {
        Livewire::test('auth.reset-password', [
            'token' => Str::random(16),
        ])
            ->set('new_password', 'password')
            ->set('new_password_confirmation', '')
            ->call('resetPassword')
            ->assertHasErrors(['new_password' => 'confirmed']);
    }

    function test_password_is_minimum_of_eight_characters()
    {
        Livewire::test('auth.reset-password', [
            'token' => Str::random(16),
        ])
            ->set('new_password', 'secret')
            ->call('resetPassword')
            ->assertHasErrors(['new_password' => 'min']);
    }

    public function test_can_view_password_reset_page()
    {
        $user = User::factory()->create();

        $token = Str::random(16);

        DB::table('password_resets')->insert([
            'email' => $user->email,
            'token' => Hash::make($token),
            'created_at' => Carbon::now(),
        ]);

        $this->get(route('password.reset', [
            'email' => $user->email,
            'token' => $token,
        ]))
            ->assertSuccessful()
            ->assertSee($user->email);
    }

    public function test_can_reset_password()
    {
        $user = User::factory()->create();

        $token = Str::random(16);

        DB::table('password_resets')->insert([
            'email' => $user->email,
            'token' => Hash::make($token),
            'created_at' => Carbon::now(),
        ]);

        Livewire::test('auth.reset-password', [
            'token' => $token,
        ])
            ->set('email', $user->email)
            ->set('new_password', 'new-password')
            ->set('new_password_confirmation', 'new-password')
            ->call('resetPassword')
            ->assertRedirect(route('dashboard'));

        $this->assertTrue(Auth::attempt([
            'email' => $user->email,
            'password' => 'new-password',
        ]));
    }
}
