@extends("admin.layouts.main")
@section("content")
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12 d-flex">
                        <h1 class="m-0 mr-3">{{$user->name()}}</h1>
                        <a href="{{route("admin.users.edit", $user->id)}}" class="text-success"><i
                                    class="fas fa-pencil-alt"></i></a>
                        <form action="{{route("admin.users.destroy", $user->id)}}"
                              method="POST">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="border-0 bg-transparent">
                                <i class="fas fa-trash text-danger" role="button"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card ml-0 bg-dark">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap bg-gray">
                                    <thead>
                                    <tr>
                                        <th>ID:</th>
                                        <td>{{$user->id}}</td>
                                    </tr>
                                    <tr>
                                        <th>ПІБ:</th>
                                        <td>{{$user->name()}}</td>
                                    </tr>
                                    <tr>
                                        <th>Пошта:</th>
                                        <td>{{$user->email}}</td>
                                    </tr>
                                    <tr>
                                        <th>Номер телефону:</th>
                                        <td>{{$user->phone_number}}</td>
                                    </tr>
                                    <tr>
                                        <th>Роль:</th>
                                        <td>{{$user->role->name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Дата створення:</th>
                                        <td>{{$user->created_at}}</td>
                                    </tr>

                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection