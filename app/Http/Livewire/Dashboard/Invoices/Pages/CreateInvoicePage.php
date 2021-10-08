<?php

namespace App\Http\Livewire\Dashboard\Invoices\Pages;

use Livewire\Component;
use Illuminate\Database\Eloquent\Collection;

class CreateInvoicePage extends Component
{
    public function render()
    {
        return view('livewire.dashboard.invoices.pages.create-invoice-page');
    }
}
