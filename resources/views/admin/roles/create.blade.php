@extends("admin.layouts.main")
@section("content")
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="pt-3 col-3 card card-primary">
                        <div class="card-header bg-dark">
                            <h3 class="card-title">Додати роль</h3></div>
                        <form action="{{route("admin.roles.store")}}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="categoryName">Назва ролі</label>
                                    <input type="text" class="form-control" name="name"
                                           placeholder="Вкажіть назву:">
                                    @error("name")
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="card">
                                    <button type="submit" class="btn btn-dark">Додати</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection