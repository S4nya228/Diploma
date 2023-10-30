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
                    <div class="pt-3 col-5 card card-primary">
                        <div class="card-header bg-dark">
                            <h3 class="card-title">Додати розділ</h3></div>
                        <form action="{{route("admin.helps.store")}}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Назва розділу</label>
                                    <input type="text" class="form-control" name="title"
                                           placeholder="Вкажіть назву:">
                                    @error("title")
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="description">Опис розділу</label>
                                    <textarea class="form-control" rows="3" type="text" placeholder="Введіть опис:" name="description" style="resize: none; height: 200px" ></textarea>
                                    @error("description")
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