@extends('layouts.homelayout')

@section('title', 'Home Page')

@section('content')
    <div class="row">
        <div class="col">
            <div class="d-flex justify-content-center m-5">
                <i class="fa fa-th-large" style="font-size:250px; color:#FFFF00;"></i>
            </div>
            <div class="d-flex justify-content-center m-5">
                <a class="btn rounded-pill" style="border: 10px solid #FFFF00; color:#FFFF00; font-size: 100px;"
                    href="{{ route('categories.index') }}"><i class="fa fa-angle-double-left"
                        style="font-size:100px; color:#FFFF00;"></i> CATEGORY</a>
            </div>
        </div>
        <div class="col">
            <div class="d-flex justify-content-center m-5">
                <i class="fa fa-cubes" style="font-size:250px; color:#1C2842;"></i>
            </div>
            <div class="d-flex justify-content-center m-5">
                <a class="btn rounded-pill" style="border: 10px solid #1C2842; color:#1C2842; font-size: 100px;"
                    href="{{ route('products.index') }}">PRODUCT
                    <i class="fa fa-angle-double-right" style="font-size:100px; color:#1C2842;"></i></a>
            </div>
        </div>
    </div>
@endsection
