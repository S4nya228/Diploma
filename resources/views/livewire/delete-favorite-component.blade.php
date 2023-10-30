<div>
    <div class="profile__holder">
        <p class="profile__content-title">Обране</p>
        <button wire:click.prevent="deleteAll" class="profile__delete-all">Очистити список</button>
    </div>
    @if($proposals->count() > 0)
    @foreach($proposals as $proposal)
        <div class="profile__content-card">
            <div class="profile__content-card-visible">
                <div class="profile__content-card-left">
                    <div class="profile__content-card-left-info">
                        <div class="profile__content-card-number-left">
                            <p>№ {{$proposal->id}}</p>
                        </div>
                        <div class="profile__content-card-region-left">
                            <p>{{$proposal->region->title}} район</p>
                        </div>
                    </div>
                    <div class="profile__content-card-title-left">
                        <a class="profile__content-card-title-link" href="{{route("proposals.show", $proposal->id)}}">
                            {{$proposal->title}}
                        </a>
                    </div>
                </div>
                <div class="profile__content-card-right">
                    <div class="profile__content-card-right-top">
                        <div class="profile__content-card-right-counts">
                            <strong class="profile__content-card-right-counts-number">@if ($proposal->vote_count == 0)
                                    0
                                @else
                                    {{$proposal->vote_count}}
                                @endif</strong> @php
                                $voteCount = $proposal->vote_count;
                                $lastDigit = $voteCount % 10;

                                if ($voteCount >= 11 && $voteCount <= 19) {
                                    echo 'голосів';
                                } elseif ($lastDigit == 1) {
                                    echo 'голос';
                                } elseif ($lastDigit >= 2 && $lastDigit <= 4) {
                                    echo 'голоси';
                                } else {
                                    echo 'голосів';
                                }
                            @endphp
                        </div>
                        <div class="profile__content-card-right-progress">
                            <progress value="{{$proposal->vote_count}}" max="5"></progress>
                        </div>
                    </div>
                    <div class="profile__content-card-right-bottom">
                        <div class="profile__content-card-right-status">
                            <img src="{{asset("storage/images/card-user.svg")}}" alt=""
                                 class="profile__content-card-right-status-logo">
                            <p>{{$proposal->status->name}}</p>
                        </div>
                        <div class="profile__content-card-right-timer">
                            <p>Залишилося {{ Carbon\Carbon::parse($proposal->countdown)->diffInDays() }}
                                @php
                                    $days = Carbon\Carbon::parse($proposal->countdown)->diffInDays();
                                    $lastDigit = substr($days, -1);

                                    if ($days >= 11 && $days <= 19) {
                                        echo 'днів';
                                    } elseif ($lastDigit == 1) {
                                        echo 'день';
                                    } elseif ($lastDigit >= 2 && $lastDigit <= 4) {
                                        echo 'дні';
                                    } else {
                                        echo 'днів';
                                    }
                                @endphp</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="profile__content-card-hidden">
                <div class="profile__content-card-bottom">
                    <div class="profile__content-hidden-author">
                        Автор: {{$proposal->user->name()}}
                    </div>
                    <button wire:click="removeFavorite({{$proposal->id}})">
                        <svg width="30" height="30" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.415 12l5.293-5.293a.999.999 0 0 0-1.414-1.414L12 10.586 6.707 5.293A.999.999 0 0 0 5.293 6.707L10.586 12l-5.293 5.293a.999.999 0 1 0 1.414 1.414L12 13.414l5.293 5.293a.999.999 0 1 0 1.414-1.414L13.414 12z" fill="#356cff"/>
                        </svg>
                    </button>

                </div>
            </div>
        </div>
    @endforeach
   {{$proposals ->links('vendor.pagination.pagination-for-livewire')}}
    @else
        <div class="profile__else-text" style="display: flex; justify-content: center; margin-top: 100px">
            <p>Схоже, що цей список порожній. Немає жодних пропозицій для відображення.</p>
        </div>

    @endif
</div>
