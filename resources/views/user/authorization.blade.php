@extends('layouts.index')
@vite(["resources/sass/login.scss","resources/js/message.js"])
@section("title",'Пропозиції та інновації')
@section('content')
    <div class="registration">
        @if(session()->has('message'))
            <div class="main__info-field message-container">
                <div class="main__info-content">
                    {{ session('message') }}
                </div>
            </div>
        @endif
        <div class="registration__holder">
            <form action="{{route('login_process')}}" method="POST">
                @csrf
                <h1 class="registration__label">Вхід</h1>
                <input class="registration__area" type="email" name="email" placeholder="Пошта">
                <input class="registration__area" type="password" name="password" placeholder="Пароль">
                @error('email')
                <div class="text-danger">{{$message}}</div>
                @enderror
                <div class="registration__recover"><a class="registration__recover-link"
                                                      href="{{route("forgot.index")}}">Забули пароль?</a>
                </div>
                <button class="registration__button-login">Увійти</button>
                <div class="registration__member">
                    Ще не зареєстровані? <a class="registration__member-link" href="{{route("register")}}">
                        Зареєструватися тут
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
