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
                            <h3 class="card-title">Редаугвати обліковий запис</h3></div>
                        <form action="{{route('admin.users.update', $user->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method("PATCH")
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="last_name">Редаугвати прізвище</label>
                                    <input type="text" class="form-control" name="last_name"
                                           placeholder="Введіть прізвище" value="{{$user->last_name}}">
                                    @error("last_name")
                                    <div class="text-danger">{{$message}}</div> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="first_name">Редаугвати ім'я</label>
                                    <input type="text" class="form-control" name="first_name"
                                           placeholder="Введіть ім'я" value="{{$user->first_name}}">
                                    @error("first_name")
                                    <div class="text-danger">{{$message}}</div> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="middle_name">Редаугвати по батькові</label>
                                    <input type="text" class="form-control" name="middle_name"
                                           placeholder="Введіть по батькові" value="{{$user->middle_name}}">
                                    @error("middle_name")
                                    <div class="text-danger">{{$message}}</div> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="role">Редаугвати роль</label>
                                    <select class="form-control" name="role_id">
                                        @foreach($roles as $role)
                                            <option {{ $role->id == $user->role_id ? "selected" : ""}} value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
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