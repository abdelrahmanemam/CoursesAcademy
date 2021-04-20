@extends('layouts.backend.app')

@section('title', 'All Courses')

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">All Courses</h4>
                            <p class="card-category"> Here is all Courses</p>
                        </div>
                        <div class="card-body">
                            <div id="table-header" class="row">
                                <div class="col-md-2">
                                    <a href="{{ route('backend.courses.create') }}" class="btn btn-info">Add Course</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table course-table">
                                    <thead class=" text-primary">
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Category
                                    </th>
                                    <th>
                                        Image
                                    </th>
                                    <th>
                                        Level
                                    </th>
                                    <th>
                                        Length
                                    </th>
                                    <th>
                                        Views
                                    </th>
                                    <th>
                                        Rating
                                    </th>
                                    <th>
                                        Description
                                    </th>
                                    <th>
                                        Options
                                    </th>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                                <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

                                <script type="text/javascript">


                                    $(function () {

                                        var table = $('.course-table').DataTable({
                                            processing: true,
                                            serverSide: true,
                                            ajax: "{{ route('backend.courses.index') }}",
                                            columns: [
                                                // {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                                                {data: 'name', name: 'name'},
                                                {data: 'category', name: 'category', orderable: false, searchable: false},
                                                {
                                                    name: "image",
                                                    data: "image",
                                                    render: function (data, type, full, meta) {
                                                        return "<img src=\"" + data + "\" height=\"50\"/>";
                                                    },
                                                    title: "Image",
                                                    "orderable": false,
                                                    "searchable": false
                                                },
                                                {data: 'level', name: 'level', orderable: false, searchable: false},
                                                {data: 'hours', name: 'hours'},
                                                {data: 'views', name: 'views'},
                                                {data: 'rating', name: 'rating'},
                                                {data: 'description', name: 'description', orderable: false, searchable: false},
                                                {data: 'action', name: 'action', orderable: false, searchable: false},

                                            ],
                                            search: {
                                                "regex": true
                                            }
                                        });
                                    });

                                    $('body').on('click', '.deleteCourse', function () {

                                        var id = $(this).data("id");
                                        var route = "courses/delete/"+id;

                                        confirm("Are You sure want to delete this Course!");

                                        $.ajax({
                                            type: "POST",
                                            data: {
                                                _token: '{{ csrf_token() }}'
                                            },
                                            url: route,
                                            success: function (data) {
                                                location.reload();
                                            },
                                            error: function (data) {
                                                console.log('Error:', data);
                                            }
                                        });
                                    });

                                    $('body').on('click', '.ActiveCourse', function () {

                                        var id = $(this).data("id");
                                        var route = "courses/active/"+id;
                                        confirm("Are You sure want to active this course!");

                                        $.ajax({
                                            type: "POST",
                                            data: {
                                                _token: '{{ csrf_token() }}'
                                            },
                                            url: route,
                                            success: function (data) {
                                                location.reload();
                                            },
                                            error: function (data) {
                                                console.log('Error:', data);
                                            }
                                        });
                                    });

                                    $('body').on('click', '.DeactiveCourse', function () {

                                        var id = $(this).data("id");
                                        var route = "courses/deactive/"+id;
                                        confirm("Are You sure want to deactivate this course!");

                                        $.ajax({
                                            type: "POST",
                                            data: {
                                                _token: '{{ csrf_token() }}'
                                            },
                                            url: route,
                                            success: function (data) {
                                                location.reload();
                                            },
                                            error: function (data) {
                                                console.log('Error:', data);
                                            }
                                        });
                                    });


                                </script>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


