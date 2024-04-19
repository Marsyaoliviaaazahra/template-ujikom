@extends('layout.dashboard')
@section('title', 'Edit Produk')
@section('content')
<section class="section">
        <div class="section-header">
            <h1>Edit Produk</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <form action="" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
                    @csrf
                    @method ('PATCH')
                    <div class="card-header">
                        <h4>Input Account</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label>Product Name</label>
                                <input type="text" name="name" placeholder="Product Name" class="form-control" value="" required>
                                <div class="invalid-feedback">
                                    please fill in the name
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label>Price</label>
                                <input type="number" name="price" placeholder="Price" class="form-control" value="}" required>
                                <div class="invalid-feedback">
                                    please fill in the username
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label>Stock</label>
                                <input type="number" name="stock" placeholder="Stock" class="form-control" value="" readonly>
                                <div class="invalid-feedback">
                                    please fill in the password
                                </div>
                               
                        
                            </div>
                                <button class="m-2 btn btn-success" type="submit" >Create</button>
                        <a href="" class="btn btn-danger">Back</a>
                    </div>
                </form>
                
            </div>
        </div>
        </div>
    </section>

@endsection













