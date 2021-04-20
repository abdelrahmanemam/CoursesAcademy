@extends('layouts.backend.app')

@section('title', 'New Admin')

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Create Admin</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('backend.home.register') }}" method="post" enctype="multipart/form-data">

                                @csrf

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">User Name</label>
                                            <input type="text"  value="{{ old('username') }}" name="username" class="form-control" required>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">password</label>
                                            <input type="password"  value="{{ old('password') }}" name="password" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">password confirmation</label>
                                            <input type="password"  value="{{ old('password_confirmation') }}" name="password_confirmation" class="form-control" required>
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

                                <button type="submit" class="btn btn-primary pull-right">Create Admin</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
