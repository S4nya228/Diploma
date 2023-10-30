<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class DeleteFavoriteComponent extends Component
{
    use WithPagination;
    protected $proposals;

    public function deleteAll()
    {
        DB::table("proposal_user")->where("user_id", auth()->user()->id)->delete();
        $this->proposals = auth()->user()->proposals->fresh();
    }

    public function removeFavorite($id)
    {
        DB::table("proposal_user")->where("user_id", auth()->user()->id)->where("proposal_id", $id)->delete();
        $this->proposals = auth()->user()->proposals()->paginate(5);
    }

    public function render()
    {
        $user = auth()->user();
        $this->proposals = $user->proposals()->paginate(5);

        return view('livewire.delete-favorite-component', [
            'proposals' => $this->proposals,
        ]);
    }

}
