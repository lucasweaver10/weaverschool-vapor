<?php

namespace App\Livewire\NewsletterSubscribers;

use Livewire\Component;
use App\Mail\Newsletter\Welcome;
use App\Models\NewsletterSubscriber;
use Illuminate\Support\Facades\Mail;

class Create extends Component
{
    public $email;
    public $subscribed = false;

    public function subscribeToNewsletter()
    {
        $this->validate([
            'email' => 'required|email|unique:newsletter_subscribers,email',
        ]);

        NewsletterSubscriber::create([
            'email' => $this->email,
        ]);

        $this->dispatch('success', message: 'You have successfully subscribed to our newsletter.'); 
        $this->subscribed = true;       
    }

    public function sendWelcomeEmail()
    {
        // Send welcome email to the subscriber
        Mail::to($this->email)->send(new Welcome());    
    }
    
    public function render()
    {
        return view('livewire.newsletter-subscribers.create');
    }
}
