@extends('layouts.categorylayout')

@section('title', 'Category Page')

@section('content')
    <div class="container p-5 my-5 rounded-3" style="border: 5px solid #FFFF00; background-color:#1C2842;">
        <div class="position-relative" style="align-items: center;">
            <h1 class="text-white"><span><i class='fa fa-th-large'></i></span><b> List of Categories</b></h1>
            <a class="btn btn-info position-absolute top-50 start-50 translate-middle-y  btn-sm rounded-3"
                href="{{ route('home') }}"><i class='fa fa-home'></i> HOME</a>
            <a class="btn btn-primary btn-sm position-absolute top-50 end-0 translate-middle-y rounded-3"
                href="{{ route('categories.create') }}"><i class='fa fa-plus-square'></i> Create Category</a>
        </div>

        <table class="table table-light table-striped table-hover">
            <thead>
                <tr>
                    <th style="width: 9%">Category ID</th>
                    <th style="width: 11%">Category Code</th>
                    <th>Description</th>
                    <th style="width: 20%">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $categories)
                    <tr>
                        <td>{{ $categories->id }}</td>
                        <td>{{ $categories->categorycode }}</td>
                        <td>{{ $categories->description }}</td>
                        <td>
                            <a class="btn btn-success btn-sm rounded-3"
                                href="{{ route('categories.show', $categories->id) }}"><i class='fa fa-eye'></i> Show</a>
                            <a class="btn btn-warning btn-sm rounded-3"
                                href="{{ route('categories.edit', $categories->id) }}"><i class='fa fa-edit'></i> Edit</a>
                            <form class="d-inline" method="POST"
                                action="{{ route('categories.destroy', $categories->id) }}">
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
