<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class TableContact extends Component
{
    use WithPagination;

    public $limit = 10;
    public $search = '';

    # Form update
    public $contactId;
    public $name;
    public $phone;
    public $email;

    public function deleteContact($contactId)
    {
        try {
            $contact = Contact::query()->findOrFail($contactId);
            $contact->delete();
            flash()->success('Xoá thành công!');
        } catch (\Exception $e) {
            flash()->error('Xoá thất bại!');
        }
    }

    public function updateContact()
    {
        try {
            $contact = Contact::query()->findOrFail($this->contactId);
            $contact->name = $this->name;
            $contact->phone = $this->phone;
            $contact->email = $this->email;
            $contact->save();
            flash()->success('Cập nhật thành công!');
        } catch (\Exception $e) {
            flash()->error('Cập nhật thất bại!');
        }
    }

    #[On('contact-created')]
    public function render()
    {
        if (empty($this->search)) {
            $contacts = Contact::query()->paginate($this->limit);
        } else {
            # Reset page
            $this->resetPage();
            $contacts = Contact::query()
                ->where('name', 'like', "%{$this->search}%")
                ->orWhere('email', 'like', "%{$this->search}%")
                ->orWhere('phone', 'like', "%{$this->search}%")
                ->paginate($this->limit);
        }
        return view('livewire.table-contact', ['contacts' => $contacts]);
    }
}
