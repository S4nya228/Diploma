@extends('layouts.index')
@vite(["resources/sass/pet-page.scss",
"resources/sass/modal-window.scss",
"resources/js/dropdown-menu-comments.js",
"resources/js/buttons-comments.js",
"resources/js/area-comments.js",
"resources/js/plugins/fontawesome-free/css/all.min.css"])
@section("title",'Пропозиції та інновації')
@section('content')
    <div class="pet-page" xmlns:livewire="http://www.w3.org/1999/html">
        <div class="pet-page__container">
            <div class="pet-page__breadcrumb">
                <ul class="pet-page__breadcrumb-list">
                    <li class="pet-page__breadcrumb-list-item"><a href="{{route("main.index")}}"
                                                                  class="pet-page__breadcrumb-link">Головна</a>
                    </li>
                    <li class="pet-page__breadcrumb-list-item-non-active">
                        {{$proposal->title}}</li>
                </ul>
            </div>

            <div class="pet-page__content">
                <div class="pet-page__content-top">
                    <div class="pet-page__content-top-left">
                        <div class="pet-page__name">
                            <div class="pet-page__title">
                                <p>{{$proposal->title}}</p>
                            </div>
                            <div class="pet-page__favorite">
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
                        <div class="pet-page__info">
                            <div class="pet-page__info-number">
                                <img src="{{asset("storage/images/number.svg")}}" alt=""
                                     class="pet-page__info-number-icon">
                                <p>№{{$proposal->id}}</p>
                            </div>
                            <div class="pet-page__info-author">
                                <img src="{{asset("storage/images/user.svg")}}" alt=""
                                     class="pet-page__info-author-icon">
                                <p>Автор пропозиції: {{$proposal->user->name()}}</p>
                            </div>
                            <div class="pet-page__info-data">
                                <img src="{{asset("storage/images/data.svg")}}" alt="" class="pet-page__info-data-icon">
                                <p>Дата
                                    публікації: {{\Carbon\Carbon::parse($proposal->created_at)->isoFormat('D MMMM YYYY', 'Do MMMM YYYY')}}</p>
                            </div>
                        </div>
                        <livewire:response-component :proposal="$proposal" />

                    </div>
                    <div class="pet-page__content-top-right">
                        <div class="pet-page__card">
                            <div class="pet-page__card-top">
                                <livewire:proposal-component :proposal="$proposal" />
                            </div>
                            <div class="pet-page__card-bottom">
                                <div class="pet-page__card-bottom-status">
                                    <img src="{{asset("storage/images/card-user.svg")}}" alt=""
                                         class="pet-page__status-logo">
                                    <p>{{$proposal->status->name}}</p>
                                </div>
                                <div class="pet-page__card-bottom-timer">
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
                            @if (Auth::guest())
                                <div class="pet-page__massage">
                                    <p>Для того, щоб підтримати пропозицію, необхідно</p>
                                    <a class="pet-page__massage-link" href="{{ route('login') }}">Авторизуватися.</a>
                                </div>
                            @else
                                <livewire:vote-component :proposal="$proposal" />
                            @endif
                        </div>
                    </div>
                </div>
                <livewire:comments-component :proposalId="$proposal->id" />
            </div>
        </div>
    </div>
@endsection