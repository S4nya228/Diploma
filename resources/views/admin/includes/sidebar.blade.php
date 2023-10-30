<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column bg-dark" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-header">Адміністратор</li>
        <li class="nav-item">
            <a href="{{route("admin.proposals.index")}}" class="nav-link">
                <i class="nav-icon far fa-clipboard"></i>
                <p>
                    Пропозиції
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route("admin.users.index")}}" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                    Користувачі
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route("admin.roles.index")}}" class="nav-link">
                <i class="nav-icon fas fa-users-cog"></i>
                <p>
                    Управління ролями
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route("admin.helps.index")}}" class="nav-link">
                <i class="nav-icon fas fa-question-circle"></i>
                <p>
                    Інформаційний розділ
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route("main.index")}}" class="nav-link">
                <i class="fas fa-sign-out-alt fa-rotate-180"></i>
                <p>
                    Вихід
                </p>
            </a>
        </li>
    </ul>
</nav>
