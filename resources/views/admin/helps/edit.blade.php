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
                            <h3 class="card-title">Редаугвати розділ</h3></div>
                        <form action="{{route('admin.helps.update', $help->id)}}" method="POST">
                            @csrf
                            @method("PATCH")
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Редаугвати назву</label>
                                    <input type="text" class="form-control" name="title"
                                           placeholder="Введіть назву" value="{{$help->title}}">
                                    @error("title")
                                    <div class="text-danger">{{$message}}</div> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="description">Редаугвати опис</label>
                                    <textarea class="form-control" rows="3" placeholder="Введіть відповідь" name="description" style="resize: none; height: 100px" >{{$help->description}}</textarea>
                                    @error("description")
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