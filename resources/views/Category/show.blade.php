@extends('layouts.categorylayout')

@section('title', 'Show Page')

@section('content')
    <div class="container p-5 my-5 text-white rounded-3" style="border: 5px solid #FFFF00; background-color:#1C2842;">
        <h1><b>Category Details</b></h1>
        <hr class="rounded-3" style="height: 5px; color: #FFFF00">
        <h2><b>Category ID: </b>{{ $show['id'] }}</h2>
        <h2><b>Category Code: </b>{{ $show['categorycode'] }}</h2>
        <h2><b>Description: </b>{{ $show['description'] }}</h2>
        <hr class="rounded-3" style="height: 5px; color: #FFFF00">
        <a class="btn btn-secondary rounded-3" href="{{ route('categories.index') }}">Back</a>
    </div>
@endsection
