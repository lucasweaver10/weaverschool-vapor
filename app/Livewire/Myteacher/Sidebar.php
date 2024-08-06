<?php

namespace App\Livewire\Myteacher;

use Livewire\Component;

class Sidebar extends Component
{
    public $registrations;
    public $tab = 'dashboard';
    public $content;
    public $showMobileMenu = 'false';

    protected $listeners = ['mobileMenuToggled' => 'toggleMobileMenu'];

    protected $queryString = [
        'tab',
        'content',
    ];

    public function toggleMobileMenu()
    {
        $this->showMobileMenu = !$this->showMobileMenu;
    }

    public function setTab($newTab)
    {
        $this->tab = $newTab;
//        $this->dispatch('tabSelected', $newTab);
    }

    public function selectContent($newContent)
    {
        $this->content = $newContent;
//        $this->dispatch('contentSelected', $newContent);
    }

    public function render()
    {
        return view('livewire.myteacher.sidebar');
    }
}
