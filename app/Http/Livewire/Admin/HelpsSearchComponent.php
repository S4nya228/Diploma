<?php

namespace App\Http\Livewire\Admin;

use App\Models\Help;
use Livewire\Component;
use Livewire\WithPagination;

class HelpsSearchComponent extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function search()
    {
        $this->resetPage();
    }

    public function render()
    {
        $helps = Help::where('title', 'like', '%'.$this->search.'%')->paginate(50);

        return view('livewire.admin.search.helps-search-component', [
            'helps' => $helps,
        ]);
    }
}
