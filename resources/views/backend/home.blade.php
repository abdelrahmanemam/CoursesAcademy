@extends('layouts.backend.app')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-warning card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">category</i>
                        </div>
                        <p class="card-category">Categories</p>
                        <h3 class="card-title"></h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons text-danger">trending_flat</i>
                            <a href="{{ route('backend.categories.index') }}">Show all...</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">add_shopping_cart</i>
                        </div>
                        <p class="card-category">Courses</p>
                        <h3 class="card-title"></h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons text-danger">trending_flat</i>
                            <a href="{{ route('backend.courses.index') }}">Show all...</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
