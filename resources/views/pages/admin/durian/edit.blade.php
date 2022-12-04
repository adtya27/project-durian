@extends('template.global')

@section('content')
@include('partials.admin-sidebar')

<div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_navbar.html -->
    @include('partials.admin-navbar')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title"> Add New Durian </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add New Durian</li>
                    </ol>
                </nav>
            </div>
            <div class="content-wrapper full-page-wrapper align-items-center">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add New Durian</h4>
                        <form method="POST" action="{{ route('durians.update', $durian->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control p_input @error('name') is-invalid @enderror"
                                    name="name" value="{{ $durian->name }}" required>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description"
                                    class="form-control p_input @error('description') is-invalid @enderror" cols="30"
                                    rows="10">
                                    {{ $durian->description}}
                                </textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input type="number" class="form-control p_input @error('price') is-invalid @enderror"
                                    name="price" value="{{ $durian->price }}" required>
                                @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Stock</label>
                                <input type="number" class="form-control p_input @error('stock') is-invalid @enderror"
                                    name="stock" value="{{ $durian->stock }}" required>
                                @error('stock')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>File input</label>
                                <input type="file" class="form-control-file @error('image') is-invalid @enderror"
                                    name="image">
                                <input type="hidden" name="old_image" value="{{ $durian->image }}">
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <small id="fileHelp" class="form-text text-muted">Max size 2 MB</small>
                            </div>
                            <div class="text-left">
                                <button type="submit" class="btn btn-primary">submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
    </div>
    <!-- main-panel ends -->
</div>
@endsection