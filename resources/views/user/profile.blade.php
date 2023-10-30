@extends('layouts.index')
@vite(["resources/sass/profile.scss"])
@section("title",'Пропозиції та інновації')
@section('content')
    <div class="profile">
        <div class="profile__container">
            <div class="profile__breadcrumb">
                <ul class="profile__breadcrumb-list">
                    <li class="profile__breadcrumb-list-item"><a href="{{route("main.index")}}"
                                                                 class="profile__breadcrumb-link">Головна</a>
                    </li>
                    <li class="profile__breadcrumb-list-item">
                        Особистий кабінет
                    </li>
                </ul>
            </div>
            <div class="profile__content">
                <div class="profile__menu">
                    <div class="profile__title">
                        Особистий кабінет
                    </div>
                    <ul class="profile__menu-list">
                        <li class="profile__menu-list-item"><img src="{{asset("storage/images/mypet.svg")}}" alt=""><a
                                    href="{{route("user.my-prop.index")}}">Створені мною</a>
                        </li>
                        <li class="profile__menu-list-item"><img src="{{asset("storage/images/signapet.svg")}}" alt=""><a
                                    href="{{route("user.my-votes.index")}}">Мої голоси</a></li>
                        <li class="profile__menu-list-item"><img src="{{asset("storage/images/lovepet.svg")}}"
                                                                  alt=""><a  id="favorite" href="{{route("user.favorite.index")}}">Обране</a>
                        </li>
                        <li class="profile__menu-list-item"><img src="{{asset("storage/images/personalacс.svg")}}"
                                                                  alt=""><a href="{{route("user.personal-details")}}">Особисті
                                дані</a></li>
                    </ul>
                </div>
                <div class="profile__card">
                    @yield('user-content')
                </div>
            </div>
        </div>
    </div>
@endsection