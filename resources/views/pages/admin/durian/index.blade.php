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
                <h3 class="page-title"> Data Durians </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Durians</li>
                    </ol>
                </nav>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Durians</h4>
                </div>
                <div class="card-body">
                    <a href="{{ route('durians.create') }}" class="btn btn-primary mb-2">Create</a>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Stock</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($durians as $key => $durian)
                                        <tr>
                                            <td>{{ $key + $durians->firstItem() }}</td>
                                            <td>
                                                <img src="{{ asset('storage/' . $durian->image) }}"
                                                    alt="{{ $durian->name }}">
                                            </td>
                                            <td>{{ $durian->name }}</td>
                                            <td>{{ $durian->price }}</td>
                                            <td>{{ $durian->stock }}</td>
                                            <td>
                                                <a href="{{ route('durians.edit', $durian->id) }}"
                                                    class="btn btn-warning">Edit</a>
                                                <form class="d-inline"
                                                    onsubmit="return confirm('Data will be Deleted, Are you sure?')"
                                                    action="{{ route('durians.destroy', $durian->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <input type="submit" class="btn btn-danger" value="Delete">
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{ $durians->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- main-panel ends -->
</div>

@endsection