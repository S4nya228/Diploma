@extends('user.profile')
@vite(["resources/sass/profile.scss","resources/sass/paginations.scss"])
@section("title",'Пропозиції та інновації')
@section('user-content')
    <p class="profile__content-title">Мої голоси</p>
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
                            <strong class="profile__content-card-right-counts-number">
                                @if ($proposal->vote_count == 0)
                                    0
                                @else
                                    {{$proposal->vote_count}}
                                @endif
                            </strong>
                            @php
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
                    @if(auth()->check())
                        <livewire:add-to-favorite-component :proposalId="$proposal->id"/>
                    @else
                        <a href="{{ route('login') }}">
                            <button>
                                <svg width="30" height="30" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M22.8333 7.6005C22.8371 9.2675 22.1948 10.8711 21.0415 12.0747C18.3971 14.8166 15.8317 17.6755 13.0898 20.3167C12.4604 20.9125 11.4627 20.8908 10.8614 20.2679L2.95849 12.0758C0.569744 9.5993 0.569744 5.60175 2.95849 3.12633C3.52306 2.53375 4.20209 2.06198 4.95442 1.73964C5.70674 1.41729 6.51669 1.25108 7.33516 1.25108C8.15363 1.25108 8.96358 1.41729 9.7159 1.73964C10.4682 2.06198 11.1473 2.53375 11.7118 3.12633L12 3.42317L12.2871 3.12633C12.8528 2.53515 13.532 2.06425 14.2841 1.74184C15.0361 1.41942 15.8455 1.25214 16.6637 1.25C18.3104 1.25 19.8845 1.926 21.0404 3.12633C22.1942 4.32975 22.8368 5.93337 22.8333 7.6005Z" stroke="#356cff" stroke-width="1.5" stroke-linejoin="round"/>
                                </svg>
                            </button>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
    @if (!$proposals->isEmpty())
    @include("vendor.pagination.paginations")
    @endif
    @else
        <div class="profile__else-text" style="display: flex; justify-content: center; margin-top: 100px">
            <p>Схоже, що цей список порожній. Немає жодних пропозицій для відображення.</p>
        </div>

    @endif
@endsection