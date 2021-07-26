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
                    <div class="card-header text-white">
                        <a href="{{ route('video.create') }}" class="btn btn-primary"> <i class="bx bx-plus"></i> Add video</a>
                    </div>
                    <div class="card-body row">
                        @foreach ($data as $item)
                            <div class="col-4">
                                <div class="card">
                                    <div class="img-thumbnail">
                                        <iframe src="{{ $item->embed }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $item->title }}</h5>
                                        <p class="card-text">{{ $item->description }}</p>
                                        <div class="d-flex justify-content-between">
                                            <a href="{{ route('video.edit',['video'=>$item->id]) }}" class="btn btn-primary">Edit</a>
                                            <form class="ml-3" action="{{ route('video.destroy',['video'=>$item->id]) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="mr-3 btn btn-danger ml-5" onclick="return confirm('Are you sure?')"><i class="bx bx-trash-alt"></i> Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection