@extends('layouts.index')
@vite(["resources/sass/login.scss"])
@section("title",'Пропозиції та інновації')
@section('content')
    <div class="registration">
        <div class="registration__holder">
            <form action="{{route('register_process')}}" method="POST">
                @csrf
                <h1 class="registration__label">Реєстрація</h1>
                <input class="registration__area" type="text" name="last_name" required pattern="^[^\s]+$"
                       title="Введіть прізвище без пробілів" value="{{old('last_name')}}" placeholder="Прізвище">
                @error('last_name')
                <div class="text-danger">{{$message}}</div>
                @enderror
                <input class="registration__area" type="text" name="first_name" required pattern="^[^\s]+$"
                       title="Введіть ім'я без пробілів" value="{{old('first_name')}}" placeholder="Ім'я">
                @error('first_name')
                <div class="text-danger">{{$message}}</div>
                @enderror
                <input class="registration__area" type="text" name="middle_name" required pattern="^[^\s]+$"
                       title="Введіть по батькові без пробілів" value="{{old('middle_name')}}"
                       placeholder="По батькові">
                @error('middle_name')
                <div class="text-danger">{{$message}}</div>
                @enderror
                <input class="registration__area" type="email" name="email" required value="{{old('email')}}"
                       placeholder="Пошта">
                @error('email')
                <div class="text-danger">{{$message}}</div>
                @enderror
                <input class="registration__area" type="tel" name="phone_number" required
                       value="{{old('phone_number')}}" placeholder="Номер телефону" pattern="^\+38[0-9]{10}$"
                       title="Введіть номер телефону у форматі +380xxxxxxxxx">
                @error('phone_number')
                <div class="text-danger">{{$message}}</div>
                @enderror
                <input class="registration__area" type="password" name="password" placeholder="Пароль">
                @error('password')
                <div class="text-danger">{{$message}}</div>
                @enderror
                <input class="registration__area" type="password" name="password_confirmation"
                       placeholder="Повторіть пароль">
                @error('password_confirmation')
                <div class="text-danger">{{$message}}</div>
                @enderror
                <div class="registration__terms">
                    <input class="registration__terms-area" type="checkbox" name="checkbox" id="checkbox">
                    <label class="registration__label-area" for="checkbox">Я погоджуюся з цими<a
                                class="registration__label-area-link" href="{{route('terms.index')}}"> Умовами та правилами</a></label>
                    @error('checkbox')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <button class="registration__button-login" type="submit">Зареєструватися</button>
                <div class="registration__member">
                    Вже зареєстровані? <a class="registration__member-link" href="{{route("login")}}">
                        Увійти тут
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection