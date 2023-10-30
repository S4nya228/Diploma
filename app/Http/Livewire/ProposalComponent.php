<?php

namespace App\Http\Livewire;

use App\Models\Proposal;
use Livewire\Component;

class ProposalComponent extends Component
{
    public $voteCount;

    protected $listeners = [
        'voteUpdated' => 'updateVoteCount',
    ];

    public function updateVoteCount($count)
    {
        $this->voteCount = $count;
    }

    public function mount(Proposal $proposal)
    {
        $this->proposal = $proposal;
        $this->voteCount = $proposal->vote_count;
    }
    public function render()
    {
        return view('livewire.proposal-component');
    }
}
