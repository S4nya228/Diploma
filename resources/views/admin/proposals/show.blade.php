@extends("admin.layouts.main")
@section("content")
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12 d-flex align-items-center">
                        <h1 class="m-0 mr-3 text-break">{{$proposal->title}}</h1>
                        <a href="{{route("admin.proposals.edit", $proposal->id)}}" class="text-success"><i
                                    class="fas fa-pencil-alt"></i></a>
                        <form action="{{route("admin.proposals.destroy", $proposal->id)}}"
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
                    <div class="col-12 ">
                        <div class="card ml-0 bg-dark">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap bg-gray">
                                    <thead>
                                    <tr>
                                        <th>ID:</th>
                                        <td>{{$proposal->id}}</td>
                                    </tr>
                                    <tr>
                                        <th>Автор:</th>
                                        <td>{{ $proposal->user->name() }}</td>
                                    </tr>
                                    <tr>
                                        <th>Назва:</th>
                                        <td>{{$proposal->title}}</td>
                                    </tr>
                                    <tr>
                                        <th>Опис:</th>
                                        <td><textarea class="form-control" rows="3" disabled placeholder="Введіть опис" name="response" style="resize: none; height: 200px" >{{$proposal->description}}</textarea></td>
                                    </tr>
                                    <tr>
                                        <th>Відповідь:</th>
                                        <td><textarea class="form-control" rows="3" disabled placeholder="Введіть відповідь" name="response" style="resize: none; height: 200px" >{{$proposal->response}}</textarea></td>
                                    </tr>
                                    <tr>
                                        <th>Статус:</th>
                                        <td>{{$proposal->status->name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Опублікована:</th>
                                        <td>{{$proposal->is_approved ? 'Так' : 'Ні'}}</td>
                                    </tr>
                                    <tr>
                                        <th>Таймер:</th>
                                        <td>{{$proposal->countdown}}</td>
                                    </tr>
                                    <tr>
                                        <th>Район:</th>
                                        <td>{{$proposal->region->title}}</td>
                                    </tr>
                                    <tr>
                                        <th>Кількість голосів:</th>
                                        <td>{{$proposal->vote_count}}</td>
                                    </tr>
                                    <tr>
                                        <th>Дата створення:</th>
                                        <td>{{$proposal->created_at}}</td>
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