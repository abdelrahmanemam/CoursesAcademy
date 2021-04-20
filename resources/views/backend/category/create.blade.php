@extends('layouts.backend.app')

@section('title', 'All Categories')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Create Category</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('backend.categories.store') }}" method="post" enctype="multipart/form-data">

                                @csrf

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Category Name</label>
                                            <input type="text" value="{{ old('name') }}" name="name" class="form-control" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Status</label>
                                            <select class="form-control" name="status">
                                                <option value="0" selected>Not Active</option>
                                                <option value="1">Active</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                @if ($errors->any())
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <button type="submit" class="btn btn-primary pull-right">Create Category</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
