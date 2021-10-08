<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Livewire\Buttons\EnableApiAccessButton;
use App\Http\Livewire\Dashboard\Panels\CreateApiTokenPanel;
use App\Http\Livewire\Dashboard\Panels\ManageApiTokensPanel;
use App\Http\Livewire\Dashboard\Panels\UpdatePasswordPanel;
use App\Http\Livewire\Dashboard\Panels\UpdateProfilePanel;

class AccountPagesTest extends TestCase
{
    use RefreshDatabase;

    public function test_pages_are_accessible_to_authenticated_users()
    {
        $this->signIn();

        collect([
            'dashboard.account.index',
            'dashboard.account.security',
            'dashboard.account.activity',
            'dashboard.account.api',
        ])->each(function($name) {
            $this->get(route($name))->assertOk();
        });
    }

    public function test_pages_are_inaccessible_to_nonauthenticated_users()
    {
        collect([
            'dashboard.account.index',
            'dashboard.account.security',
            'dashboard.account.activity',
            'dashboard.account.api',
        ])->each(function($name) {
            $this->get(route($name))->assertRedirect(route('login'));
        });
    }

    public function test_overview_page_contains_livewire_panel()
    {
        $this->signIn();

        $this->get(route('dashboard.account.index'))
            ->assertOk()
            ->assertSeeLivewire(UpdateProfilePanel::class);
    }

    public function test_security_page_contains_livewire_panel()
    {
        $this->signIn();

        $this->get(route('dashboard.account.security'))
            ->assertOk()
            ->assertSeeLivewire(UpdatePasswordPanel::class);
    }

    public function test_api_page_contains_livewire_panels()
    {
        $user = $this->signIn();

        $this->get(route('dashboard.account.api'))
            ->assertOk()
            ->assertSeeLivewire(EnableApiAccessButton::class);
            
        $user->enableApiAccess();

        $this->get(route('dashboard.account.api'))
            ->assertOk()
            ->assertSeeLivewire(CreateApiTokenPanel::class)
            ->assertSeeLivewire(ManageApiTokensPanel::class);
    }
}