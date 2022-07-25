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
                <h3 class="page-title"> Data Admins </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Admins</li>
                    </ol>
                </nav>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Admins</h4>
                </div>
                <div class="card-body">
                    <a href="{{ route('admins.create') }}" class="btn btn-primary mb-2">Create</a>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="order-listing" class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($admins as $key => $admin)
                                        <tr>
                                            <td>{{ $key + $admins->firstItem() }}</td>
                                            <td>{{ $admin->name }}</td>
                                            <td>{{ $admin->email }}</td>
                                            <td>
                                                <a href="{{ route('admins.edit', $admin->id) }}"
                                                    class="btn btn-warning">Edit</a>
                                                <form class="d-inline"
                                                    onsubmit="return confirm('Data will be Deleted, Are you sure?')"
                                                    action="{{ route('admins.destroy', $admin->id) }}" method="post">
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
                            {{ $admins->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- main-panel ends -->
</div>

@endsection