@extends('layouts.backend.app')

@section('title', 'All Admins')

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">All Admins</h4>
                            <p class="card-category"> Here is all admins</p>
                        </div>
                        <div class="card-body">
                            <div id="table-header" class="row">
                                <div class="col-md-2">
                                    <a href="{{ route('backend.home.signup') }}" class="btn btn-info">Add Admin</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table category-table">
                                    <thead class=" text-primary">
                                    <th>
                                        Username
                                    </th>
                                    </thead>
                                    <tbody>
                                    @foreach($admins as $admin)
                                        <tr>
                                            <td>
                                                {{$admin}}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection