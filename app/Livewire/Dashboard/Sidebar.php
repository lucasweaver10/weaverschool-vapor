<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;

class Sidebar extends Component
{
    public $user;
    public $registrations;
    public $tab = 'dashboard';
    public $content;

    protected $queryString = [
        'tab',
        'content',
    ];

    public function setTab($newTab)
    {
        $this->tab = $newTab;
        $this->content = 'overview';
        $this->dispatch('tabSelected', $newTab);
    }

    public function selectContent($newContent)
    {
        $this->content = $newContent;
        $this->dispatch('contentSelected', $newContent);
    }

    public function render()
    {
        return view('livewire.dashboard.sidebar');
    }
}
