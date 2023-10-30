<div class="pet-page__vote-button-container">
    @if (!$voted)
        <button class="pet-page__vote-button" wire:click="vote">
            <div class="pet-page__voted-content">
                <img src="{{ asset('storage/images/signPets.svg') }}" alt="" class="pet-page__vote-icon">
                Проголосувати
            </div>
        </button>
    @else
        <div class="pet-page__voted-text">
            <div class="pet-page__voted-content">
                <img src="{{ asset('storage/images/succesVote.svg') }}" alt="" class="pet-page__vote-icon">
                Ви проголосували!
            </div>
        </div>
    @endif
</div>