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
                    <div class="pt-3 col-7 card card-primary">
                        <div class="card-header bg-dark">
                            <h3 class="card-title">Редаугвати пропозицію</h3></div>
                        <form action="{{route('admin.proposals.update', $proposal->id)}}" method="POST">
                            @csrf
                            @method("PATCH")
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="Name">Редаугвати назву</label>
                                    <textarea class="form-control" rows="3" placeholder="Введіть назву" name="title" style="resize: none;" >{{$proposal->title}}</textarea>
                                    @error("title")
                                    <div class="text-danger">{{$message}}</div> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="Name">Редаугвати опис</label>
                                    <textarea class="form-control" rows="3" placeholder="Введіть опис" name="description" style="resize: none; height: 200px" >{{$proposal->description}}</textarea>
                                    @error("description")
                                    <div class="text-danger">{{$message}}</div> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="Name">Редаугвати відповідь</label>
                                    <textarea class="form-control" rows="3" placeholder="Введіть відповідь" name="response" style="resize: none; height: 200px" >{{$proposal->response}}</textarea>
                                    @error("response")
                                    <div class="text-danger">{{$message}}</div> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="Category">Опублікована:</label>
                                    <select class="custom-select-lg" name="is_approved">
                                        <option value="1" {{ $proposal->is_approved ? "selected" : "" }}>Так</option>
                                        <option value="0" {{ !$proposal->is_approved ? "selected" : "" }}>Ні</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="Category">Змінити район</label>
                                    <select class="form-control" name="region_id">
                                        @foreach($regions as $region)
                                            <option {{ $region->id == $proposal->region_id ? "selected" : ""}} value="{{ $region->id }}">{{ $region->title }}</option>
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