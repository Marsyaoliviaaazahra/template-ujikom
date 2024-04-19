<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.



    |create-sale
    @extends('layout.dashboard')
@section('title', 'Dashboard - Sale')
@section('content')
    <section class="section">
        <section class="section-header">
            <h1>Sale</h1>
        </section>
        <div class="section-body">
            <form action="{{ route('sale.invoice') }}" method="post" novalidate class="needs-validation">
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

    |index-sale
@extends('layout.dashboard')
@section('title', 'Dashboard - Sale')
@section('content')
    <section class="section">
        <section class="section-header">
            <h1>Sale</h1>
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
                        <h3>Sale List</h3>
                        <div class="card-header-form">
                            <div class="input-group">
                                <div class="input-group-btn">
                                    <a href="/dashboard/sale/export" class="btn btn-success my-3" target="_blank">Export to
                                        Excel</a>
                                    @if (Auth::user()->role == 'staff')
                                        <a href="{{ route('sale.create') }}" class="btn btn-primary"><i
                                                class="fas fa-plus mr-2"></i>New
                                            Sale</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped table-md">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name Customer</th>
                                        <th>Sale Date</th>
                                        <th>Total Price</th>
                                        <th>Created By</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sales as $sale)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $sale->customer->name }}</td>
                                            <td>{{ $sale->sale_date }}</td>
                                            <td>Rp{{ number_format($sale->total_price, 0, ',' . '.') }}</td>
                                            <td>{{ $sale->user->name }}</td>
                                            <td>
                                                <button class="btn btn-primary" data-toggle="modal"
                                                    data-target="#exampleModal{{ $sale->id }}">Show Detail</button>
                                                <a href="{{ route('sale.download', $sale->id) }}"
                                                    class="btn btn-warning">Download Payment</a>
                                                <form action="{{ route('sale.destroy', $sale->id) }}" method="POST"
                                                    class="d-inline">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger"><i
                                                            class="fas fa-trash"></i>Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @foreach ($sales as $sale)
        <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal{{ $sale->id }}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Detail Sale {{ $sale->id }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div>Customer Name: {{ $sale->detailSales->first()->sale->customer->name }}</div>
                        <div>Customer Address: {{ $sale->detailSales->first()->sale->customer->address }}</div>
                        <div>Customer Phone: {{ $sale->detailSales->first()->sale->customer->phone }}</div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sale->detailSales as $item)
                                    <tr>
                                        <th>{{ $item->product->name }}</th>
                                        <td>{{ $item->quantity }}</td>
                                        <td>Rp{{ number_format($item->product->price, 0, ',' . '.') }}</td>
                                        <td>Rp{{ number_format($item->subtotal, 0, ',' . '.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div>Total Price: Rp{{ number_format($sale->total_price, 0, ',' . '.') }}</div>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection

|invoice-sale
@extends('layout.dashboard')
@section('title', 'Dashboard - Invoice')
@section('content')
    <div class="card">
        <div class="card-header">
            Invoice
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div>
                    <div>Customer Name: {{ $data['name'] }}</div>
                    <div>Customer Address: {{ $data['address'] }}</div>
                    <div>Customer Phone: {{ $data['phone'] }}</div>
                </div>
                <a href="/dashboard/sale/pdf" class="btn btn-primary h-100" target="_blank">Export PDF</a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Product Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detailSale as $item)
                        <tr>
                            <th>{{ $item['name'] }}</th>
                            <td>{{ $item['quantity'] }}</td>
                            <td>Rp{{ number_format($item['price'], 0, ',' . '.') }}</td>
                            <td>Rp{{ number_format($item['subtotal'], 0, ',' . '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mb-3">Total Price: Rp{{ number_format($totalPrice, 0, ',' . '.') }}</div>
            <div class="d-flex justify-content-between">
                <a href="#" class="btn btn-primary">Cancel</a>
                <form action="{{ route('sale.store') }}" method="post">
                    @csrf
                    <button href="#" class="btn btn-primary" type="submit">Confirm</button>
                </form>
            </div>
        </div>
    </div>
@endsection

|pdf-sale
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <style>
        #back-wrap {
            margin: 30px auto 0 30px;
            width: 450px;
            display: flex;
            justify-content: flex-end;
        }

        .btn-back {
            width: fit-content;
            padding: 8px 15px;
            color: #fff;
            background: #666;
            border-radius: 5px;
            text-decoration: none;
        }

        #receipt {
            box-shadow: 5px 10px 15px rgba(0, 0, 0, 0.5);
            padding: 20px;
            margin: 30px auto 0 auto;
            width: 500px;
            background: #fff;
        }

        h2 {
            font-size: .9rem;
        }

        p {
            font-size: .8rem;
            color: #666;
            line-height: 1.2rem;
        }

        #top {
            margin-top: 25px;
        }

        #top .info {
            text-align: center;
            margin: 20px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            padding: 5px 0 5px 15px;
            border: 1px dolif #eee;
        }

        .tabletitle {
            font-size: .5rem;
            background: #eee;
        }

        .service {
            border-bottom: 1px solid #eee;
        }

        .itemtext {
            font-size: .7rem;
        }

        #legalcopy {
            margin-top: 15px;
        }

        .btn-print {
            float: right;
            color: #333;
        }
    </style>
</head>

<body>
    <div id="back-wrap">
    </div>
    <div id="receipt">
        <center id="top">
            <h2>Cashier</h2>
        </center>
        <div id="mid">
            <div class="info">
                <br>
                Nama Pelanggan : {{ $data['name'] }}</br>
                Alamat Pelanggan : {{ $data['address'] }}</br>
                No HP Pelanggan : {{ $data['phone'] }}</br>
                </p>
            </div>
        </div>
        <div id="bot">
            <div id="table">
                <table>
                    <tr class="tabletitle">
                        <td class="item">
                            <h2>Product Name</h2>
                        </td>
                        <td class="item">
                            <h2>Quantity</h2>
                        </td>
                        <td class="item">
                            <h2>Price</h2>
                        </td>
                        <td class="item">
                            <h2>Subtotal</h2>
                        </td>
                    </tr>
                    @foreach ($detailSale as $item)
                        <tr class="service">
                            <td class="tableitem">
                                <p class="itemtext">{{ $item['name'] }}</p>
                            </td>
                            <td class="tableitem">
                                <p class="itemtext">{{ $item['quantity'] }}</p>
                            </td>
                            <td class="tableitem">
                                <p class="itemtext">Rp{{ number_format($item['price'], 0, ',' . '.') }}</p>
                            </td>
                            <td class="tableitem">
                                <p class="itemtext">Rp{{ number_format($item['subtotal'], 0, ',' . '.') }}</p>
                            </td>
                        </tr>
                    @endforeach
                    <tr class="tabletitle">
                        <td></td>
                        <td></td>
                        <td>
                            <h2>Total Price</h2>
                        </td>
                        <td>
                            <h2>Rp{{ number_format($totalPrice, 0, ',' . '.') }}</h2>
                        </td>
                    </tr>
                </table>
            </div>
            <div id="legalcopy">
                <center>
                    {{-- <p>{{ }} | Chasier</p> --}}
                    <p class="legal"><strong>Thank You!</strong></p>
                </center>
            </div>
        </div>
    </div>
</body>
</html>








    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    'allowed_methods' => ['*'],

    'allowed_origins' => ['*'],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false,

];
