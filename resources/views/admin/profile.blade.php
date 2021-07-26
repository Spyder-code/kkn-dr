@extends('layouts.admin')
@section('page','Profile')
@section('breadcrumb')
    <li><a href="{{ route('home') }}" class="breadcrumb-item nav-link">Dashboard </a></li>
    <li><a href="#" class="breadcrumb-item nav-link disabled">/ </a></li>
    <li><a href="#" class="breadcrumb-item active nav-link active"> Profile</a></li>
@endsection
@section('content')
<div class="container-fluid">

    @if ($message = Session::get('success'))
        <div class="row">
            <div class="col mt-3">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
    @endif
    @if ($message = Session::get('danger'))
        <div class="row">
            <div class="col mt-3">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3 col-md-12">
            <div class="white-box">
                <div class="user-bg">
                    <div class="overlay-box">
                        <form action="{{ route('profile.update.image',['id'=>Auth::id()]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="file" id="avatar" name="avatar" onchange="submit()" hidden>
                            <div class="user-content">
                                <label for="avatar" style="cursor: pointer"><img src="{{ Auth::user()->avatar }}"
                                        class=" img-thumbnail" alt="img"></label>
                            </div>
                        </form>
                    </div>
                </div>
                <div class=" d-md-flex">
                    <form class="form-horizontal form-material" method="POST" action="{{ route('profile.update',['id'=>Auth::id()]) }}">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group mb-4">
                                    <label class="col-md-12">Username</label>
                                    <div class="col-md-12 border-bottom">
                                        <input type="text" name="username" value="{{ Auth::user()->username }}"
                                            class="form-control border-0"> </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="col-md-12">Full Name</label>
                                    <div class="col-md-12 border-bottom">
                                        <input type="text" name="name" value="{{ Auth::user()->name }}"
                                            class="form-control border-0"> </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="example-email" class="col-md-12">Email</label>
                                    <div class="col-md-12 border-bottom">
                                        <input type="email" readonly value="{{ Auth::user()->email }}"
                                            class="form-control border-0" name="email"
                                            id="example-email">
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success" type="submit">Update Profile</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-8 col-xlg-9 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal form-material" method="POST" action="{{ route('profile.update.password',['id'=>Auth::id()]) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-4">
                            <label class="col-md-12">Current password</label>
                            <div class="col-md-12 border-bottom">
                                <input type="password" name="current_password" class="form-control border-0">
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12">New password</label>
                            <div class="col-md-12 border-bottom">
                                <input type="password" name="password" class="form-control border-0">
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="example-email" class="col-md-12">Confirm password</label>
                            <div class="col-md-12 border-bottom">
                                <input type="password" name="password_confirmation" class="form-control border-0">
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="col-sm-12">
                                <button class="btn btn-success" type="submit">Update Password</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
