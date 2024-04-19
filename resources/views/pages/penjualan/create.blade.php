{{-- @extends('layout.dashboard')
@section('title', 'Create Penjualan')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Penjualan</h1>
        </div>
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
        <div class="section-body">
            <form action="" method="post" class="needs-validation" novalidate>
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h4>Informasi Pelanggan:</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label>Nama<span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" required>
                                <div class="invalid-feedback">
                                    Silahkan isi nama!
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label>No Telp<span class="text-danger">*</span></label>
                                <input type="number" name="phone" class="form-control" required>
                                <div class="invalid-feedback">
                                    Silahkan isi nomor telepon
                                </div>
                            </div>
                            <div class="form-group col-12">
                                <label>Alamat</label>
                                <textarea name="address" class="form-control"></textarea>
                                <div class="invalid-feedback">
                                    Silahkan isi alamat
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row product-input">
                            <div class="form-group col-md-4 col-12">
                                <label for="">Product</label>
                                <select name="products[]" class="form-control">
                                    <option disabled selected>Select Product</option>
                                    <!-- @foreach ($products as $product) -->
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    <!-- @endforeach -->
                                </select>
                            </div>
                            <div class="form-group col-md-4 col-sm-6 col-12">
                                <label>Kuantitas<span class="text-danger">*</span></label>
                                <input type="number" name="quantities[]" class="form-control total-input" required>
                                <div class="invalid-feedback">
                                    Silahkan isi kuantitas
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
                <div id="productInputs">
                    <div class="card">
                        <div class="card-body">
                            <div class="row product-input">
                                    <div class="form-group col-md-4 col-12">
                                        <label for="">Product</label>
                                        <select name="products[]" class="form-control">
                                            <option disabled selected>Select Product</option>
                                            @foreach ($products as $product)
                                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                                            @endforeach
                                        </select>
                                </div>
                                <div class="form-group col-md-4 col-sm-6 col-12">
                                    <label>Kuantitas<span class="text-danger">*</span></label>
                                    <input type="number" name="quantities[]" class="form-control total-input" required>
                                    <div class="invalid-feedback">
                                        Silahkan isi kuantitas
                                    </div>
                                </div>
                               
                                <div class="form-group col-12">
                                    <button type="button" class="btn btn-danger"
                                        onclick="removeProductInput(this)">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <button type="button" class="btn btn-primary" onclick="addProductInput()">Tambah Input
                        Produk</button>
                    <button class="btn btn-success">Buat Invoice</button>
                </div>
            </form>
        </div>
    </section>

@endsection
@section('scripts')
    <script>
        function addProductInput() {
            var productInputs = document.getElementById('productInputs');
            var newProductInput = productInputs.children[0].cloneNode(true);
            var dicountInput = document.getElementById('discount');
            productInputs.appendChild(newProductInput);
            newProductInput.querySelectorAll('input').forEach(function(input) {
                input.value = '';
                discountInput.value = 0;
            });
        }

        function removeProductInput(button) {
            var cardBody = button.closest('.card-body');
            cardBody.parentElement.remove();
        }
    </script>
@endsection --}}


@extends('layout.dashboard')
@section('title', 'Dashboard - Sale')
@section('content')
    <section class="section">
        <section class="section-header">
            <h1>Sale</h1>
        </section>
        <div class="section-body">
            <form action="" method="post" novalidate class="needs-validation">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h4>Customer Information</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label for="name">Customer Name</label>
                                <input type="text" class="form-control" name="name" id="name" required>
                                <div class="invalid-feedback">
                                    Please fill in your name
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="phone">Customer Phone</label>
                                <input type="number" class="form-control" name="phone" id="phone" required>
                                <div class="invalid-feedback">
                                    Please fill in your phone
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="address">Customer Address</label>
                                <textarea type="text" class="form-control" name="address" id="address" required></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="productInputContainer">
                    <div class="card">
                        <div class="card-body">
                            <div class="row product-input">
                                <div class="form-group col-md-6 col-12">
                                    <label for="">Product</label>
                                    <select name="products[]" class="form-control">
                                        <option disabled selected>Select Product</option>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>Quantity</label>
                                    <input type="number" name="quantities[]" class="form-control total-input" required>
                                    <div class="invalid-feedback">
                                        please fill in the quantity
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <button type="button" class="btn btn-primary" onclick="addProductInput()">Add Product</button>
                    <button class="btn btn-success">Buy</button>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        function addProductInput() {
            var productInputContainer = document.getElementById("productInputContainer")
            var newProductInput = productInputContainer.children[0].cloneNode(true)
            var newIndex = productInputContainer.children.length
            newProductInput.querySelectorAll("input").forEach(function(input) {
                input.value = ''
            })
            newProductInput.querySelector("select").name = 'products[' +
                newIndex + ']'
            productInputContainer.appendChild(newProductInput)
        }

        function removeProductInput(button) {
            var card = button.closest('.card')
            card.remove()
        }
    </script>
@endsection