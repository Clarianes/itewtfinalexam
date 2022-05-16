@extends('layouts.productlayout')

@section('title', 'Show Page')

@section('content')
    <div class="container p-5 my-5 text-body rounded-3" style="border: 5px solid #1C2842; background-color:#FFFF00;">
        <h1><b>Product Details</b></h1>
        <hr class="rounded-3" style="height: 5px; color: #1C2842">
        <h2><b>Product ID: </b>{{ $show['id'] }}</h2>
        <h2><b>Product Code: </b>{{ $show['productcode'] }}</h2>
        <h2><b>Product Name: </b>{{ $show['productname'] }}</h2>
        <h2><b>Description: </b>{{ $show['description'] }}</h2>
        <h2><b>Category ID: </b>{{ $show['category_id'] }}</h2>
        <h2><b>Color: </b>{{ $show['color'] }}</h2>
        <h2><b>Size: </b>{{ $show['size'] }}</h2>
        <h2><b>Price: </b>{{ $show['price'] }}</h2>
        <hr class="rounded-3" style="height: 5px; color: #1C2842">
        <a class="btn btn-secondary rounded-3" href="{{ route('products.index') }}">Back</a>
    </div>
@endsection
