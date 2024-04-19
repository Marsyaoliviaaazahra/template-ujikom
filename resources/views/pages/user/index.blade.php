@extends('layout.dashboard')
@section('title', 'Dashboard - User')
@section('content')
    <section class="section">
        <section class="section-header">
            <h1>User</h1>
        </section>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                    <b>Success:</b>
                    {{ session('success') }}
                </div>
            </div>
        @endif
        @if (session('fail'))
            <div class="alert alert-danger alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                    <b>Fail:</b>
                    Produk dengan kode
                    @foreach (session('fail') as $code)
                        <b>{{ $code }}</b>,
                    @endforeach
                    tidak tersedia
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h3>User List</h3>
                        <div class="card-header-form">
                            <div class="input-group">
                                <div class="input-group-btn">
                                    <a href="" class="btn btn-primary"><i
                                            class="fas fa-plus mr-2"></i>New
                                        User</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped table-md">
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>

                                <tr>
                                        <td></td>
                                        <td></td>
                                        <td>td>
                                        <td></td>
                                        <td>
                                            <a href="" class="btn btn-warning">Edit</a>
                                            <form action="" method="POST"
                                                class="d-inline">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger"><i
                                                        class="fas fa-trash"></i>Delete</button>
                                            </form>
                                        </td>
                                    </tr>

                                </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection