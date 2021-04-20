@extends('layouts.backend.app')

@section('title', 'All Categories')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Update Category</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('backend.categories.update', $category->id) }}" method="post" enctype="multipart/form-data">

                                @csrf
                                @method('put')

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Category Name</label>
                                            <input type="text" name="name" class="form-control" value="{{ $category->name }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <select class="form-control" name="status">
                                                <option value="0" @if ($category->status == 0) selected @endif>Not Active</option>
                                                <option value="1" @if ($category->status == 1) selected @endif>Active</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary pull-right">Update Category</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

