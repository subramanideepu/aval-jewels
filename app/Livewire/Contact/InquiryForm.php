<?php

namespace App\Livewire\Contact;

use App\Models\Inquiry;
use Livewire\Component;

class InquiryForm extends Component
{
    public $name;
    public $email;
    public $subject;
    public $message;
    public $successMessage;

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email',
        'subject' => 'required',
        'message' => 'required|min:10',
    ];

    public function submit()
    {
        $this->validate();

        Inquiry::create([
            'name' => $this->name,
            'email' => $this->email,
            'subject' => $this->subject,
            'message' => $this->message,
            'status' => 'new',
        ]);

        $this->reset(['name', 'email', 'subject', 'message']);
        $this->successMessage = 'Your inquiry has been sent successfully. Our concierge will contact you soon.';
    }

    public function render()
    {
        return view('livewire.contact.inquiry-form');
    }
}
