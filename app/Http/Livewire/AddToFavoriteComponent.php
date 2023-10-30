<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AddToFavoriteComponent extends Component
{
    public $proposalId;
    public $isFavorite;

    public function mount()
    {
        $user = auth()->user();
        $this->proposals = $user->proposals;
        if (auth()->check()) {
            $this->isFavorite = DB::table('proposal_user')
                ->where('user_id', auth()->user()->id)
                ->where('proposal_id', $this->proposalId)
                ->exists();
        }
    }

    public function addToFavorite($proposalId)
    {
        if ($this->isFavorite) {
            // Видалення з улюбленого
            DB::table('proposal_user')
                ->where('user_id', auth()->user()->id)
                ->where('proposal_id', $proposalId)
                ->delete();
            $this->proposals = auth()->user()->proposals->fresh();
        } else {
            // Додавання в улюблене
            DB::table('proposal_user')->insert([
                'user_id' => auth()->user()->id,
                'proposal_id' => $proposalId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $this->isFavorite = !$this->isFavorite;
    }

    public function render()
    {
        return view('livewire.add-to-favorite-component');
    }
}
