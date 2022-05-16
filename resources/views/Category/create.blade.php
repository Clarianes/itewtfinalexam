@extends('layouts.categorylayout')

@section('title', 'Create Page')

@section('content')
    <div class="container p-5 my-5 text-white rounded-3" style="border: 5px solid #FFFF00; background-color:#1C2842;">
        <h1><b>Create New Category</b></h1>
        <hr class="rounded-3" style="height: 5px; color: #FFFF00">

        @if ($errors->any())
            <div class="mt-2 alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('categories.store') }}" method="POST">
            @csrf

            <div>
                <label class="form-label"><b>Category Code:</b></label>
                <input type="text" class="form-control" name="categorycode">
            </div>

            <div class="mt-2">
                <label class="form-label"><b>Description:</b></label>
                <input type="text" class="form-control" name="description">
            </div>

            <hr class="rounded-3" style="height: 5px; color: #FFFF00">
            <a class="btn btn-secondary rounded-3" href="{{ route('categories.index') }}">Back</a>
            <button type="submit" class="btn btn-primary float-end rounded-3">Submit</button>
        </form>
    </div>
@endsection
