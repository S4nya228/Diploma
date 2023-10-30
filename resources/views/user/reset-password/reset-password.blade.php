@extends('layouts.index')
@vite(["resources/sass/login.scss"])
@section("title",'Пропозиції та інновації')
@section('content')
    <div class="registration">
        <div class="registration__holder">
            <form action="{{route('reset.update', $token)}}" method="POST">
                @csrf
                @method('PATCH')
                <h1 class="registration__label">Зміна паролю</h1>
                <input class="registration__area" type="email" name="email" required value="{{old('email')}}"
                       placeholder="Пошта">
                @error('email')
                <div class="text-danger">{{$message}}</div>
                @enderror
                <input class="registration__area" type="password" name="password" placeholder="Новий пароль">
                @error('password')
                <div class="text-danger">{{$message}}</div>
                @enderror
                <input class="registration__area" type="password" name="password_confirmation"
                       placeholder="Повторіть пароль">
                @error('password_confirmation')
                <div class="text-danger">{{$message}}</div>
                @enderror
                <input name="token" hidden="hidden" type="text" value="{{$token}}">
                <button class="registration__button-login">Змінити</button>
            </form>
        </div>
    </div>
@endsection