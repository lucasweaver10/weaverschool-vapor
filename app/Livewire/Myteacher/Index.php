<?php

namespace App\Livewire\Myteacher;

use Livewire\Component;

class Index extends Component
{
    public $registrations;
    public $user;
    public $tab = 'dashboard';
    public $content = 'overview';
    public $showMobileMenu = 'false';

    protected $listeners = ['contentSelected', 'tabSelected'];

    protected $queryString = [
        'tab',
        'content',
    ];

    public function tabSelected($newTab)
    {
        $this->tab = $newTab;
        $this->content = 'overview';
    }

    public function contentSelected($choice)
    {
        $this->content = $choice;
    }

    public function toggleMobileMenu()
    {
        $this->showMobileMenu = !$this->showMobileMenu;
    }

    public function setTab($newTab)
    {
        $this->tab = $newTab;
//        $this->content = 'overview';
        $this->dispatch('tabSelected', $newTab);
    }

    public function selectContent($newContent)
    {
        $this->content = $newContent;
        $this->dispatch('contentSelected', $newContent);
    }

    public function render()
    {
        return view('livewire.myteacher.index');
    }
}
