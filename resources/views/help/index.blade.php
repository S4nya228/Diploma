@extends('layouts.index')
@vite(["resources/sass/help.scss", "resources/js/for-active.js"])
@section('content')
    <div class="help">
        <div class="help__container">
            <div class="help__breadcrumb">
                <ul class="help__breadcrumb-list">
                    <li class="help__breadcrumb-list-item"><a href="{{route("main.index")}}" class="help__breadcrumb-link">Головна</a>
                    </li>
                    <li class="help__breadcrumb-list-item">
                        Додаткова інформація</li>
                </ul>
            </div>
            <div class="help__content">
                <div class="help__content-left">
                    <div class="help__title">
                        <p>{{$help->title}}</p>
                    </div>
                    <div class="help__description">
                        <p>{{$help->description}}</p>
                    </div>
                </div>
                <div class="help__content-right">
                    <ul class="help__content-right-aside">
                        @foreach($helps as $helpItem)
                            <li class="help__content-right-aside-item {{$help->id == $helpItem->id ? "active-help" : ""}}">
                                <a href="{{ route('help.index', ['id' => $helpItem->id]) }}">{{ $helpItem->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>

</script>