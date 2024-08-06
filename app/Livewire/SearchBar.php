<?php

namespace App\Livewire;

use Livewire\Component;

class SearchBar extends Component
{
    public $query = '';
    public $searchModalVisible = false;

    public function handleQuery()
    {
        $this->dispatch('query-made', query: $this->query);
        $this->searchModalVisible = false;
    }
    
    public function render()
    {
        return view('livewire.search-bar');
    }
}
