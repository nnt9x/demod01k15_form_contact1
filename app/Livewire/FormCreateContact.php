<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Component;

class FormCreateContact extends Component
{
    public $name;
    public $phone;
    public $email;

    public function save()
    {
        Contact::query()->create(
            [
                'name' => $this->name,
                'phone' => $this->phone,
                'email' => $this->email,
            ]
        );
        flash()->success('Tạo thành công!');
        # Bắn thêm 1 bản tin -> đã tạo thành công
        $this->dispatch('contact-created');
    }


    public function render()
    {
        return view('livewire.form-create-contact');
    }
}
