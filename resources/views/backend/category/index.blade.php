@extends('layouts.backend.app')

@section('title', 'All Categories')

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">All Categories</h4>
                            <p class="card-category"> Here is all categories</p>
                        </div>
                        <div class="card-body">
                            <div id="table-header" class="row">
                                <div class="col-md-2">
                                    <a href="{{ route('backend.categories.create') }}" class="btn btn-info">Add Category</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table category-table">
                                    <thead class=" text-primary">
                                    <th>
                                        Name
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

                                        var table = $('.category-table').DataTable({
                                            processing: true,
                                            serverSide: true,
                                            ajax: "{{ route('backend.categories.index') }}",
                                            columns: [
                                                // {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                                                {data: 'name', name: 'name'},
                                                {data: 'action', name: 'action', orderable: false, searchable: false},
                                            ],
                                        });
                                    });

                                    $('body').on('click', '.deleteCategory', function () {

                                        var id = $(this).data("id");
                                        var route = "categories/delete/"+id;

                                        confirm("Are You sure want to delete this Category!");

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

                                    $('body').on('click', '.ActiveCategory', function () {

                                        var id = $(this).data("id");
                                        var route = "categories/active/"+id;
                                        confirm("Are You sure want to active this category!");

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

                                    $('body').on('click', '.DeactiveCategory', function () {

                                        var id = $(this).data("id");
                                        var route = "categories/deactive/"+id;
                                        confirm("Are You sure want to deactivate this category!");

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