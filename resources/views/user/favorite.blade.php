@extends('user.profile')
@vite(["resources/sass/profile.scss"])
@section("title",'Пропозиції та інновації')
@section('user-content')
    <livewire:delete-favorite-component />
@endsection