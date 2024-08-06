<?php

namespace App\Livewire;

use App\Mail\ChatBubbleAdminNotification;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;

class ChatBubble extends Component
{
    public $subject;
    public $message;
    public $successMessage;

    protected $rules = [
        'subject' => 'required|string|max:255',
        'message' => 'required|string',
    ];

    public function sendMessage()
    {
        $this->validate();

        Mail::to('lucas@weaverschool.com')->send(new ChatBubbleAdminNotification($this->subject, $this->message, auth()->user()));        

        $this->successMessage = 'Thanks! Your message has been sent!';
        $this->reset(['subject', 'message']);
    }    
    
    public function render()
    {
        return view('livewire.chat-bubble');
    }
}
