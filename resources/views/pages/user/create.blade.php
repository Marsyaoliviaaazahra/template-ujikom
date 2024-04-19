@extends('layout.dashboard')
@section('title', 'Create User')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>New Account</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <form action="" method="post" class="needs-validation" novalidate>
                    @csrf
                    <div class="card-header">
                        <h4>Input Account</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label>Name</label>
                                <input type="text" name="name" placeholder="Name" class="form-control" required>
                                <div class="invalid-feedback">
                                    please fill in the name
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label>Email</label>
                                <input type="text" name="email" placeholder="Email" class="form-control" required>
                                <div class="invalid-feedback">
                                    please fill in the username
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label>Password</label>
                                <input type="password" name="password" placeholder="********" class="form-control" required>
                                <div class="invalid-feedback">
                                    please fill in the password
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label>Role</label>
                                <select class="form-control" name="role">
                                    <option disabled selected>Select Role</option>
                                    <option value="staff">Staff</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-success">Create</button>
                        <a href="" class="btn btn-danger">Back</a>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </section>
@endsection
