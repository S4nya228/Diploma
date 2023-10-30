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
                            <h3 class="card-title">Редаугвати товар</h3></div>
                        <form action="{{route('admin.roles.update', $roles->id)}}" method="POST">
                            @csrf
                            @method("PATCH")
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="Name">Редаугвати назву</label>
                                    <input type="text" class="form-control" name="name"
                                           placeholder="Введіть назву" value="{{$roles->name}}">
                                    @error("title")
                                    <div class="text-danger">{{$message}}</div> @enderror
                                </div>
                                    <button type="submit" class="btn btn-dark">Змінити</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection