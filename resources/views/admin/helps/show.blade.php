@extends("admin.layouts.main")
@section("content")
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12 d-flex align-items-center">
                        <h1 class="m-0 mr-3 text-break">{{$help->title}}</h1>
                        <a href="{{route("admin.helps.edit", $help->id)}}" class="text-success"><i
                                    class="fas fa-pencil-alt"></i></a>
                        <form action="{{route("admin.helps.destroy", $help->id)}}"
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
                                        <td>{{$help->id}}</td>
                                    </tr>
                                    <tr>
                                        <th>Назва:</th>
                                        <td>{{$help->title}}</td>
                                    </tr>
                                    <tr>
                                        <th>Опис:</th>
                                        <td><textarea class="form-control" rows="3" placeholder="Введіть опис" name="response" style="resize: none; height: 150px" >{{$help->description}}</textarea></td>
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