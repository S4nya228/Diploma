<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="card-header">
                <h1 class="card-title">Користувачі</h1>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 300px;">
                        <input type="text" name="table_search" wire:model="search" class="form-control float-right" style="font-size: 16px;" placeholder="Пошук...">
                    </div>

                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            @if($users->isEmpty())
                <p class="text-center mt-4" style="font-size: 20px;">Ця таблиця пуста!</p>
            @else
            <div class="table-dark">
                <div class="col-12 bg-dark">
                    <div class="card ml-0 bg-dark">
                        <div class="card-body table-responsive p-0">

                            <table class="table table-hover text-nowrap bg-gray">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Користувач</th>
                                    <th>Роль</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{ $user->name()}}</td>
                                        <td>{{$user->role->name}}</td>

                                        <td><a href="{{route("admin.users.show", $user->id)}}"><i
                                                        class="far fa-eye"></i></a></td>
                                        <td><a href="{{route("admin.users.edit", $user->id)}}"
                                               class="text-success">
                                                <i class="fas fa-pencil-alt"></i></a></td>
                                        <td>
                                            <form action="{{route("admin.users.destroy", $user->id)}}"
                                                  method="POST">
                                                @csrf
                                                @method("DELETE")
                                                <button type="submit" class="border-0 bg-transparent">
                                                    <i class="fas fa-trash text-danger" role="button"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </section>
    {{$users->links('vendor.pagination.pagination-for-livewire')}}
</div>
