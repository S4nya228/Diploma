@extends("admin.layouts.main")
@vite(["resources/sass/paginations.scss"])
@section("content")
    <div class="content-wrapper">
        <livewire:admin.proposals-search-component />
    </div>
@endsection