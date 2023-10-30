@extends("admin.layouts.main")
@section("content")
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="card-header">
                    <h1 class="card-title">Управління ролями</h1>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row bg">
                    <div class="col-1 mb-3">
                        <a href="{{route("admin.roles.create")}}" class="btn btn-block btn-dark">Додати</a>
                    </div>
                </div>

                <div class="table-dark">
                    <div class="col-12 bg-dark">
                        <div class="card ml-0 bg-dark">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap bg-gray">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Роль</th>
                                        <th>Дата створення</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($roles as $role)
                                        <tr>
                                            <td>{{$role->id}}</td>
                                            <td>{{$role->name}}</td>
                                            <td>{{$role->created_at}}</td>

                                            <td><a href="{{route("admin.roles.edit", $role->id)}}"
                                                   class="text-success">
                                                    <i class="fas fa-pencil-alt"></i></a></td>
                                            <td>
                                                <form action="{{route("admin.roles.destroy", $role->id)}}"
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
            </div>
        </section>
    </div>
@endsection