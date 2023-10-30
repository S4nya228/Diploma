@vite(["resources/sass/header.scss", "resources/sass/burger.scss", "resources/js/burger.js"])
<header class="header">
    <div class="header__container">
        <div class="header__top">
            <div class="header__top-holder">
                <div class="header__top-function-holder">
                    <div class="header__help">
                        <a href="{{route('help.index', $helpId)}}" class="header__help-link">
                            <p>Додаткова інформація</p>
                        </a>
                    </div>
                    <div class="header__login">
                        @auth("web")
                            <a href="{{route("user.my-prop.index")}}" class="header__login-link">
                                <p>{{ auth()->user()->name()}}</p>
                            </a>
                        @endauth
                        @guest("web")
                        <a href="{{route("login")}}" class="header__login-link">
                            <p>Увійти</p>
                        </a>
                            @endguest
                    </div>
                </div>
            </div>
        </div>
        <div class="header__bottom">
            <div class="header__info">
                <div class="header__logo">
                    <a href="{{route("main.index")}}">
                        <img src="{{asset("storage/images/home_logo.svg")}}" alt="image" class="header__logo-icon">
                    </a>
                </div>
                <div class="header__name">
                    <div class="header__name-title">
                        <p>ПРОПОЗИЦІЇ ТА ІННОВАЦІЇ</p>
                    </div>
                    <div class="header__name-description">
                        <p>Електронні пропозиції та інновації з можливістю голосування</p>
                    </div>
                </div>
            </div>
            <div class="header__create-petition">
                <a href="{{route("proposals.create")}}">
                    <button class="header__create-petition-button">
                        Створити пропозицію
                        <img src="{{asset("storage/images/create-petition.svg")}}" alt="image" class="header__create-petition-button-icon">
                    </button>
                </a>
            </div>
            <div class="header__search-box">
            <livewire:search.main-search-component/>
            </div>
            <div class="burger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
</header>