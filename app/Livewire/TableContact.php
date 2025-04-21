<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Attributes\On;
use Livewire\Component;

class TableContact extends Component
{
    #[On('contact-created')]
    public function render()
    {
        $contacts = Contact::query()->get();
        return view('livewire.table-contact', ['contacts' => $contacts]);
    }
}
