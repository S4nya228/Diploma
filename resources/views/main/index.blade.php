@extends('layouts.index')
@vite(['resources/sass/main.scss' , 'resources/js/main.js', 'resources/js/for-active.js'])
@section("title",'Пропозиції та інновації')
@section('content')
    <div class="main">
        <div class="main__container">
            <div class="main__menu">
                <div class="main_menu-list">
                    <ul class="main__menu-list-item">
                        <li class="main__menu-list-item-link"><a class="main__active-link" id="in_progress"
                                                                 href="{{ route('main.index', ['status_id' => 'in_progress']) }}">ТРИВАЄ
                                ЗБІР
                                ГОЛОСІВ</a></li>
                        <li class="main__menu-list-item-link">
                            <a class="main__active-link" id="under_review"
                               href="{{ route('main.index', ['status_id' => 'under_review']) }}">ЗНАХОДЯТЬСЯ НА
                                РОЗГЛЯДІ</a>
                        </li>

                        <li class="main__menu-list-item-link"><a class="main__active-link"
                                                                 id="received_response"
                                                                 href="{{ route('main.index', ['status_id' => 'received_response']) }}">ОТРИМАЛИ
                                ВІДПОВІДЬ</a></li>
                    </ul>
                </div>
                <div class="main__menu-sort">
                    <p class="main__menu-sort-title">Фільтрувати за районом:</p>
                    <form action="{{ route('main.index') }}" method="GET">
                        <select name="region_id" class="main__menu-sort-item" onchange="this.form.submit()">
                            <option value="">Всі райони</option>
                            @foreach ($regions as $region)
                                <option value="{{ $region->id }}" {{ Request::get('region_id') == $region->id ? 'selected' : '' }}>
                                    {{ $region->title }}
                                </option>
                            @endforeach
                        </select>
                    </form>
                </div>
            </div>
            <div class="main__first-page">
                <div class="main__content">
                    @if ($search)
                        <p class="main__label-search" >За результати пошуку по запиту «{{ $search }}» було знайдено
                            @if ($proposals->total() > 0)
                                {{ $proposals->total() }}
                                @php
                                    $count = $proposals->total();
                                    $lastDigit = $count % 10;

                                    if ($count >= 11 && $count <= 19) {
                                        echo 'пропозицій';
                                    } elseif ($lastDigit == 1) {
                                        echo 'пропозиція';
                                    } elseif ($lastDigit >= 2 && $lastDigit <= 4) {
                                        echo 'пропозиції';
                                    } else {
                                        echo 'пропозицій';
                                    }
                                @endphp
                            @else
                                0 пропозицій
                            @endif</p>
                    @endif
                    <p class="main__content-title">{{$title}}</p>
                    <div class="main__content-sort">
                        <div class="main__content-sort-item" {{ $sort === 'date' ? 'active' : '' }}>
                            <a class="main__active-link" id="date"
                               href="{{ route('main.index', ['sort' => 'date', 'status_id' => $status, 'direction' => $nextDirection, 'region_id' => $regionId, 'search' => $search]) }}">За
                                датою публікації</a>
                        </div>
                        <div class="main__content-sort-item" {{ $sort === 'vote' ? 'active' : '' }}>
                            <a class="main__active-link" id="vote"
                               href="{{ route('main.index', ['sort' => 'vote', 'status_id' => $status, 'direction' => $nextDirection, 'region_id' => $regionId, 'search' => $search]) }}">За
                                кількістю голосів</a>
                        </div>
                    </div>
                    @if($proposals->count() > 0)
                    @foreach ($proposals as $proposal)
                        <div class="main__content-card">
                            <div class="main__content-card-visible">
                                <div class="main__content-card-left">
                                    <div class="main__content-card-left-info">
                                        <div class="main__content-card-number-left">
                                            <p>№{{$proposal->id}}</p>
                                        </div>
                                        <div class="main__content-card-region-left">
                                            <p>{{$proposal->region->title}} район</p>
                                        </div>
                                    </div>
                                    <div class="main__content-card-title-left">
                                        <a class="main__content-card-title-link"
                                           href="{{route("proposals.show", $proposal->id)}}">
                                            {{$proposal->title}}
                                        </a>
                                    </div>
                                </div>
                                <div class="main__content-card-right">
                                    <div class="main__content-card-right-top">
                                        <div class="main__content-card-right-counts">
                                            <strong class="main__content-card-right-counts-number">
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
                                        <div class="main__content-card-right-progress">
                                            <progress value="{{$proposal->vote_count}}" max="5"></progress>
                                        </div>
                                    </div>

                                    <div class="main__content-card-right-bottom">
                                        <div class="main__content-card-right-status">
                                            <img src="{{asset("storage/images/card-user.svg")}}" alt=""
                                                 class="main__content-card-right-status-logo">
                                            <p>{{$proposal->status->name}}</p>
                                        </div>
                                        <div class="main__content-card-right-timer">
                                            Залишилося {{ Carbon\Carbon::parse($proposal->countdown)->diffInDays() }}
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
                                            @endphp
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="main__content-card-hidden">
                                <div class="main__content-card-bottom">
                                    <div class="main__content-hidden-author">
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
                    @else
                        <p class="main__else-text">Схоже, що цей список порожній. Немає жодних пропозицій для відображення.</p>
                    @endif
                    @if (!$proposals->isEmpty())
                    @include("vendor.pagination.paginations")
                    @endif
                </div>
                <div class="main__aside">
                    <div class="main__aside-title">
                        <img src="{{asset("storage/images/aside-qa.svg")}}" alt="" class="main__aside-title-logo">
                        <p>ОСТАННІ ВІДПОВІДІ</p>
                    </div>
                    <div class="main__aside-content-bottom">
                        @foreach($responses as $responce)
                            <div class="main__aside-text">
                                <a href="{{route("proposals.show", $responce->id)}}"
                                   class="main__aside-text-link">{{$responce->title}}</a>
                            </div>
                            <div class="main__aside-data">
                                <img src="{{asset("storage/images/data.svg")}}" alt="" class="main__aside-data-logo">
                                <p>{{\Carbon\Carbon::parse($responce->updated_at)->isoFormat('D MMMM YYYY', 'Do MMMM YYYY')}}</p>
                            </div>
                        @endforeach
                    </div>
                    <div class="main__aside-answer">
                        <a class="main__aside-answer-link"
                           href="{{ route('main.index', ['status_id' => 'received_response']) }}">Переглянути всі
                            відповіді ></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection