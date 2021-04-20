@extends('layouts.backend.app')

@section('title', 'All Courses')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Update Course</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('backend.courses.update', $course->id) }}" method="post" enctype="multipart/form-data">

                                @csrf
                                @method('put')

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Course Name</label>
                                            <input type="text" name="name" class="form-control" value="{{ $course->name }}">
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
                                            <label class="bmd-label-floating">Category</label>
                                            <select class="form-control" name="category_id">
                                                @foreach($categories as $category)
                                                <option value= {{ $category->id }} @if ($course->categories->first()->id == $category->id) selected @endif>{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Level</label>
                                            <select class="form-control" name="level_id">
                                                @foreach($levels as $level)
                                                    <option value= {{ $level->id }} @if ($course->level->id == $level->id) selected @endif>{{$level->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Course Length</label>
                                            <input type="text" name="hours" class="form-control" value="{{ $course->hours }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Course Description</label>
                                            <div class="form-group">
                                                <label class="bmd-label-floating"> Write a short description.</label>
                                                <textarea name="description" class="form-control" rows="5">{{$course->description}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <select class="form-control" name="status">
                                                <option value="0" @if ($course->status == 0) selected @endif>Not Active</option>
                                                <option value="1" @if ($course->status == 1) selected @endif>Active</option>
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

                                <button type="submit" class="btn btn-primary pull-right">Update Course</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection