<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class NavbarNotifications extends Component
{
    public $notifications;
    public $unreadNotifications;

    protected $listeners = ['getNotifications', 'markAllAsRead', 'refresh' => '$refresh',];

    public function mount()
    {
        $this->notifications = collect([]);
        $this->unreadNotifications = collect([]);
        $this->notifications = auth()->user()->notifications;
        $this->unreadNotifications = auth()->user()->unreadNotifications;
    }

    public function getNotifications()
    {
        $this->notifications = auth()->user()->notifications;
    }

    public function markAllAsRead()
    {
        foreach ($this->unreadNotifications as $notification) {

            $notification->markAsRead();
        }

        $this->dispatch('refresh')->self();

    }

    public function render()
    {
        return view('livewire.navbar-notifications');
    }
}
