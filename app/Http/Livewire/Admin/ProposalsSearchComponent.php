<?php

namespace App\Http\Livewire\Admin;

use App\Models\Proposal;
use Livewire\Component;
use Livewire\WithPagination;

class ProposalsSearchComponent extends Component
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
        $query = Proposal::query();

        if (!empty($this->search)) {
            $query->where('title', 'ilike', '%'.$this->search.'%')
                ->orWhereHas('status', function ($query) {
                    $query->where('name', 'ilike', '%'.$this->search.'%');
                });
        }

        $proposals = $query->paginate(50);

        return view('livewire.admin.search.proposals-search-component', [
            'proposals' => $proposals,
        ]);
    }
}

