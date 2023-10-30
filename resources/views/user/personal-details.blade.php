@extends('user.profile')
@vite(["resources/sass/user-details.scss", "resources/js/profile.js"])
@section("title",'Пропозиції та інновації')
@section('user-content')
    <p class="profile__content-title">Особисті дані</p>
    <div class="personal-details">
        <div class="personal-details__content">
            <form class="personal-details__form" action="{{route("user.profile.update", auth()->user()->id)}}" method="POST">
                @csrf
                @method("PATCH")
                <div class="personal-details__first-name">
                    <div class="personal-details__first-name-title">
                        Прізвище:
                    </div>
                    <div class="personal-details__first-name-description">
                        <input class="personal-details__txt" disabled type="text" name="last_name"  pattern="^[^\s]+$" title="Введіть прізвище без пробілів"
                               value="{{auth()->user()->last_name}}">
                        @error('last_name')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="personal-details__last-name">
                    <div class="personal-details__last-name-title">
                        Ім'я:
                    </div>
                    <div class="personal-details__last-name-description">
                        <input class="personal-details__txt" disabled type="text" name="first_name"  pattern="^[^\s]+$" title="Введіть ім'я без пробілів"
                               value="{{auth()->user()->first_name}}">
                        @error('first_name')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="personal-details__middle-name">
                    <div class="personal-details__middle-name-title">
                        По батькові:
                    </div>
                    <div class="personal-details__middle-name-description">
                        <input class="personal-details__txt" disabled type="text" name="middle_name"  pattern="^[^\s]+$" title="Введіть по батькові без пробілів"
                               value="{{auth()->user()->middle_name}}">
                        @error('middle_name')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="personal-details__email">
                    <div class="personal-details__email-name-title">
                        Пошта:
                    </div>
                    <div class="personal-details__email-name-description">
                        <input class="personal-details__txt" disabled type="email" name="email"
                               value="{{auth()->user()->email}}" size="{{ strlen(auth()->user()->email) }}">
                        @error('email')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="personal-details__phone">
                    <div class="personal-details__email-name-title">
                        Номер телефону:
                    </div>
                    <div class="personal-details__email-name-description">
                        <input class="personal-details__txt"  type="tel" disabled name="phone_number"  placeholder="Номер телефону" pattern="^(?:\+38)?[0-9]{10}$" title="Введіть номер телефону у форматі +380xxxxxxxxx"
                               value="{{auth()->user()->phone_number}}">
                        @error('phone_number')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="personal-details__buttons">
                    <div class="personal-details__button">
                        <div class="personal-details__edit">
                            <button class="personal-details__edit-button" type="button">
                                Редагувати
                            </button>
                            <button class="personal-details__save-button" type="submit">
                                Зберегти
                            </button>
                        </div>
                    </div>
                    <div class="personal-details__exit">
                        <a class="personal-details__exit-button" href="{{route("logout")}}" type="button">
                            Вийти з облікового запису
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection