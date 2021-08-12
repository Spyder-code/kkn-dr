@extends('layouts.admin')

@section('content')
    <div class="container">
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

        <div class="row mt-5">
            <div class="col">
                <div class="card">
                    <div class="card-body row">
                        @foreach ($data as $item)
                            <div class="col-4">
                                <div class="card">
                                    <video class="img-thumbnail" width="98%" src="{{ $item->file }}" controls></video>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $item->title }}</h5>
                                        <p class="card-text">{{ $item->description }}</p>
                                        <p class="card-text text-sm-center">By: {{ $item->name }}</p>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <a href="{{ $item->file }}" class="btn btn-success"><i class="bx bx-download"></i> Download</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
