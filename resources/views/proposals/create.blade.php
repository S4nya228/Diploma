@extends('layouts.index')
@vite(["resources/sass/petition.scss", "resources/js/main.js"])
@section("title",'Пропозиції та інновації')
@section('content')
<div class="petition">
    <div class="petition__container">
        <div class="petition__breadcrumb">
            <ul class="petition__breadcrumb-list">
                <li class="petition__breadcrumb-list-item"><a href="{{route("main.index")}}" class="petition__breadcrumb-link">Головна</a>
                </li>
                <li class="petition__breadcrumb-list-item"><a href="#" class="petition__breadcrumb-link-active">
                        Створити пропозицію</a></li>
            </ul>
        </div>
        <form action="{{route('proposals.store')}}" method="POST">
            @csrf
            <div class="petition__content">
                <div class="petition__content-left">
                    <div class="petition__title">
                        Створення пропозиції
                    </div>
                    <div class="petition__name-petition">
                        <div class="petition__name-title">
                            <p>Суть пропозиції</p>
                        </div>
                        <div class="petition__name-description">
                        <textarea class="petition__name-area" maxlength="500" type="text" name="title"
                                  id="title"></textarea>
                            @error("title")
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="petition__description-petition">
                        <div class="petition__description-title">
                            <p>Опис пропозиції</p>
                        </div>
                        <div class="petition__description-description">
                        <textarea class="petition__description-area" maxlength="5000" type="text" name="description"
                                  id="description"></textarea>
                            @error("description")
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="petition__menu-sort">
                        <p>Оберіть район:</p>
                        <select name="region_id" id="select" class="main__menu-sort-item">
                            @foreach ($regions as $region)
                                <option class="main__menu-sort-item-link" value="{{ $region->id }}">{{ $region->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="petition__content-right">
                    <div class="petition__author">
                        <p>Автор пропозиції:</p>
                    </div>
                    <div class="petition__author-info">
                        <div class="petition__info-name">
                            <img src="{{asset("storage/images/user.svg")}}" alt="user" class="petition__name-icon">
                            <p>{{auth()->user()->name()}}</p>
                        </div>
                        <div class="petition__info-email">
                            <img src="{{asset("storage/images/email.svg")}}" alt="user" class="petition__email-icon">
                            <p>{{auth()->user()->email}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="petition__create-petition">
                <button class="petition__create-petition-button">Створити
                    пропозицію
                </button>
            </div>
        </form>
    </div>
</div>
@endsection