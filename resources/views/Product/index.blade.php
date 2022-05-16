@extends('layouts.productlayout')

@section('title', 'Product Page')

@section('content')
    <div class="container p-5 my-5 rounded-3" style="border: 5px solid #1C2842; background-color:#FFFF00;">
        <div class="position-relative" style="align-items: center;">
            <h1 class="text-body"><span><i class='fa fa-cubes'></i></span><b> List of Products</b></h1>
            <a class="btn btn-info position-absolute top-50 start-50 translate-middle-y  btn-sm rounded-3"
                href="{{ route('home') }}"><i class='fa fa-home'></i> HOME</a>
            <a class="btn btn-primary btn-sm position-absolute top-50 end-0 translate-middle-y rounded-3"
                href="{{ route('products.create') }}"><i class='fa fa-plus-square'></i> Create Product</a>
        </div>

        <table class="table table-light table-striped table-hover">
            <thead>
                <tr>
                    <th style="width: 8%">Product ID</th>
                    <th style="width: 10%">Product Code</th>
                    <th style="width: 11%">Product Name</th>
                    <th>Description</th>
                    <th>Category ID</th>
                    <th>Color</th>
                    <th>Size</th>
                    <th>Price</th>
                    <th style="width: 20%">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $products)
                    <tr>
                        <td>{{ $products->id }}</td>
                        <td>{{ $products->productcode }}</td>
                        <td>{{ $products->productname }}</td>
                        <td>{{ $products->description }}</td>
                        <td>{{ $products->category_id }}</td>
                        <td>{{ $products->color }}</td>
                        <td>{{ $products->size }}</td>
                        <td>{{ $products->price }}</td>
                        <td>
                            <a class="btn btn-success btn-sm rounded-3"
                                href="{{ route('products.show', $products->id) }}"><i class='fa fa-eye'></i> Show</a>
                            <a class="btn btn-warning btn-sm rounded-3"
                                href="{{ route('products.edit', $products->id) }}"><i class='fa fa-edit'></i> Edit</a>
                            <form class="d-inline" method="POST"
                                action="{{ route('products.destroy', $products->id) }}">
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <button type="submit" class="btn btn-danger btn-sm rounded-3 show_confirm"
                                    data-toggle="tooltip" title='Delete'><i class='fa fa-trash'></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `Are you sure you want to delete this record?`,
                    text: "If you delete this, it will be gone forever.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });
    </script>
@endsection
