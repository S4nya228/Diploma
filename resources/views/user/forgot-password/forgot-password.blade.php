@extends('layouts.index')
@vite(["resources/sass/login.scss"])
@section("title",'Пропозиції та інновації')
@section('content')
    <div class="registration">
        <div class="registration__holder">
            <form action="{{route('forgot.store')}}" method="POST">
                @csrf
                @method('POST')
                <h1 class="registration__label">Відновлення паролю</h1>
                <input class="registration__area" type="email" name="email" placeholder="Введіть пошту" title="На цю пошту вам буде надіслане посилання для відновлення.">
                @error('email')
                <div class="text-danger">{{$message}}</div>
                @enderror
                <button class="registration__button-login">Відправити</button>
            </form>
        </div>
    </div>
@endsection