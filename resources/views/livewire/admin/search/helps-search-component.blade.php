<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="card-header">
                <h1 class="card-title">Інформаційний розділ</h1>
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
            <div class="row bg">
                <div class="col-1 mb-3">
                    <a href="{{route("admin.helps.create")}}" class="btn btn-block btn-dark">Додати</a>
                </div>
            </div>
            @if($helps->isEmpty())
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
                                    <th>Назва</th>
                                    <th>Дата створення</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($helps as $help)
                                    <tr>
                                        <td>{{$help->id}}</td>
                                        <td >{{$help->title}}</td>
                                        <td>{{$help->created_at}}</td>

                                        <td><a href="{{route("admin.helps.show", $help->id)}}"><i
                                                        class="far fa-eye"></i></a></td>
                                        <td><a href="{{route("admin.helps.edit", $help->id)}}"
                                               class="text-success">
                                                <i class="fas fa-pencil-alt"></i></a></td>
                                        <td>
                                            <form action="{{route("admin.helps.destroy", $help->id)}}"
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
    {{$helps->links('vendor.pagination.pagination-for-livewire')}}
</div>
