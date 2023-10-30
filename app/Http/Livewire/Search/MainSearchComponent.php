<?php

namespace App\Http\Livewire\Search;

use App\Models\Proposal;
use Livewire\Component;

class MainSearchComponent extends Component
{
    public $search;
    public $suggestions = [];

    public function updatedSearch()
    {
        $this->suggestions = [];

        if (!empty($this->search)) {
            $proposals = Proposal::where(function ($query) {
                $query->where('id', 'like', '%' . $this->search . '%')->orWhereRaw(
                    'LOWER(title) LIKE ?',
                    ['%' . mb_strtolower($this->search, 'UTF-8') . '%']
                );
            })
                ->where('is_approved', true)
                ->limit(10)
                ->get();

            foreach ($proposals as $proposal) {
                $this->suggestions[] = [
                    'id' => $proposal->id,
                    'title' => $proposal->title,
                ];
            }
        }
    }

    public function performSearch()
    {
        return redirect()->route('main.index', ['search' => $this->search]);
    }

    public function openProposal($suggestionId)
    {
        $proposal = Proposal::find($suggestionId);
        if ($proposal) {
            return redirect()->route('proposals.show', $proposal);
        }
    }

    public function render()
    {
        return view('livewire.search.main-search-component', [
            'suggestions' => $this->suggestions,
        ]);
    }
}
