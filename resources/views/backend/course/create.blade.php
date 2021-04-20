@extends('layouts.backend.app')

@section('title', 'All Courses')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Create Course</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('backend.courses.store') }}" method="post" enctype="multipart/form-data">

                                @csrf

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <select class="form-control" name="category_id">
                                                <option value="0" selected>Select Category</option>
                                                @foreach($categories as $category)
                                                    <option value={{$category->id}}>{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Course Name</label>
                                            <input type="text" value="{{ old('name') }}" name="name" class="form-control" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="file" name="image" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Course Description</label>
                                            <div class="form-group">
                                                <label class="bmd-label-floating"> Write a short description.</label>
                                                <textarea name="description"  value="{{ old('description') }}" class="form-control" rows="5"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Course Level</label>
                                            <select class="form-control" name="level_id">
                                                @foreach($levels as $level)
                                                    <option value={{$level->id}}>{{$level->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Course Length (hours)</label>
                                            <input type="text" value="{{ old('hours') }}" name="hours" class="form-control" required>
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

                                <button type="submit" class="btn btn-primary pull-right">Create Course</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

