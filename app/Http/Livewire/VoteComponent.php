<?php

namespace App\Http\Livewire;

use App\Models\Proposal;
use Livewire\Component;

class VoteComponent extends Component
{
    public $proposal;
    public $voted = false;

    public function mount(Proposal $proposal)
    {
        $this->proposal = $proposal;

        // Перевірити, чи користувач вже голосував за цю пропозицію
        $user = auth()->user();
        if ($this->userHasVoted($user)) {
            $this->voted = true;
        }
    }

    public function vote()
    {
        // Отримати користувача, який голосує
        $user = auth()->user();


        if (!$user->hasVerifiedEmail()) {
            // Перенаправити користувача на сторінку верифікації пошти з повідомленням про необхідність підтвердження
            return redirect()->route('verification.notice');
        }

        // Зберегти голос у базі даних
        $this->saveVote($user);

        // Оновити пропозицію
        $this->proposal = $this->proposal->fresh();

        // Встановити флаг, що користувач проголосував
        $this->voted = true;
    }

    private function userHasVoted($user)
    {
        return $this->proposal->votes()->where('user_id', $user->id)->exists();
    }

    private function saveVote($user)
    {
        $vote = $this->proposal->votes()->create([
            'user_id' => $user->id,
        ]);

        $this->proposal->vote_count = $this->proposal->votes()->count();
        $this->proposal->save();
        $this->emit('voteUpdated', $this->proposal->vote_count);
    }

    public function render()
    {
        return view('livewire.vote-component');
    }
}
