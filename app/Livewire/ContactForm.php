<?php

namespace App\Livewire;

use App\Models\Inquiry;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;

class ContactForm extends Component
{
    public $name;
    public $email;
    public $subject = 'Inquiry about Collection';
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
        ]);

        // Optional: Send Email notification to admin
        // Mail::to('admin@avaljewels.com')->send(new \App\Mail\InquiryReceived($inquiry));

        $this->reset(['name', 'email', 'message']);
        $this->successMessage = 'Thank you for your inquiry. We will get back to you soon.';
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
