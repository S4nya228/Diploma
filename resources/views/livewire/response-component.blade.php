<div>
    <div class="pet-page__answer">
        <ul class="pet-page__answer-menu">
            <li class="pet-page__answer-menu-item {{$displayType === 'proposal' ? 'active' : ''}}">
                <button type="button" wire:click="showProposal">Текст пропозиції</button>
            </li>
            <li class="pet-page__answer-menu-item {{$displayType === 'response' ? 'active' : ''}}">
                <button type="button" wire:click="showResponse">Відповідь на пропозицію</button>
            </li>
        </ul>
    </div>
    <div class="pet-page__description">
        @if ($text)
            <div class="pet-page__description-area" wire:model="text">{{$text}}</div>
        @else
            <div class="pet-page__description-area" style="font-weight: 450">Відповіді на дану пропозицію ще немає.</div>
        @endif
    </div>
</div>

