@extends('layouts.productlayout')

@section('title', 'Create Page')

@section('content')
    <div class="container p-5 my-5 text-body rounded-3" style="border: 5px solid #1C2842; background-color:#FFFF00;">
        <h1><b>Create New Product</b></h1>
        <hr class="rounded-3" style="height: 5px; color: #1C2842">

        @if ($errors->any())
            <div class="mt-2 alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('products.store') }}" method="POST">
            @csrf

            <div>
                <label class="form-label"><b>Product Code:</b></label>
                <input type="text" class="form-control" name="productcode">
            </div>

            <div class="mt-2">
                <label class="form-label"><b>Product Name:</b></label>
                <input type="text" class="form-control" name="productname">
            </div>

            <div class="mt-2">
                <label class="form-label"><b>Description:</b></label>
                <input type="text" class="form-control" name="description">
            </div>

            <div class="mt-2">
                <div class="form-group">
                    <label class="form-label"><b>Category ID:</b></label>
                    <select class="form-select" name="category_id">
                        @forelse ($categories as $categories)
                            <option>{{ $categories->id }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mt-2">
                <label class="form-label"><b>Color:</b></label>
                <input type="text" class="form-control" name="color">
            </div>

            <div class="mt-2">
                <label class="form-label"><b>Size:</b></label>
                <input type="text" class="form-control" name="size">
            </div>

            <div class="mt-2">
                <label class="form-label"><b>Price:</b></label>
                <input type="text" class="form-control" name="price">
            </div>

            <hr class="rounded-3" style="height: 5px; color: #1C2842">
            <a class="btn btn-secondary rounded-3" href="{{ route('products.index') }}">Back</a>
            <button type="submit" class="btn btn-primary float-end rounded-3">Submit</button>
        </form>
    </div>
@endsection
