<form wire:submit.prevent="performSearch">
    <div class="header__search-holder">
        <input  class="header__input" type="text" wire:model.debounce.300ms="search" id="search-input" name="search"
               placeholder="Пошук..."
               @if(!empty($search)) style="border-bottom-left-radius: 0; border-bottom-right-radius: 0;" @endif>
        <button type="submit"
                style="border-bottom-left-radius: {{ !empty($search) ? '0' : '20px' }}; border-bottom-right-radius: {{ !empty($search) ? '0' : '20px' }};">
            <img src="{{ !empty($search) ? asset("storage/images/search_logo_no_border.svg") : asset("storage/images/search_logo.svg") }}"
                 alt="" class="header__icon"></button>
        @if(!empty($search))
            <div class="tip">
                @if(count($suggestions) > 0)
                    @foreach($suggestions as $suggestion)
                        <p class="tip__link" wire:click="openProposal({{ $suggestion['id'] }})">
                            №{{ $suggestion['id'] }} {{ $suggestion['title'] }}</p>
                    @endforeach
                @else
                    <p class="tip__label">Збігів не було знайдено</p>
                @endif
            </div>
        @endif
    </div>
</form>
