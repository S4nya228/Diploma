<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Proposal;

class ResponseComponent extends Component
{
    public $proposal;
    public $displayType = 'proposal';
    public $text;

    public function mount(Proposal $proposal)
    {
        $this->proposal = $proposal;
        $this->updateText();
    }

    public function updateText()
    {
        $this->text = $this->displayType === 'response' ? $this->proposal->response : $this->proposal->description;
    }

    public function showResponse()
    {
        $this->displayType = 'response';
        $this->updateText();
    }

    public function showProposal()
    {
        $this->displayType = 'proposal';
        $this->updateText();
    }

    public function render()
    {
        return view('livewire.response-component');
    }
}

