@extends('layouts.admin')

@section('style')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection
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
                        <a href="{{ route('video.index') }}" class="btn btn-primary"> <i class="bx bx-arrow-back"></i> Back</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('video.update',['video'=>$video->id]) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="mt-3">
                                <label>Title</label><span class="text-danger">*</span>
                                <input value="{{ $video->title }}" type="text" name="title" class="form-control">
                            </div>
                            <div class="mt-3">
                                <label>Description</label><span class="text-danger">*</span>
                                <textarea class="form-control" name="description" cols="30" rows="5">{{ $video->description }}</textarea>
                            </div>
                            <div class="mt-3">
                                <label>Link youtube</label><span class="text-danger">*</span>
                                <input value="{{ $video->link }}" type="text" name="link" class="form-control">
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-success"><i class="bx bx-save"></i> Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- include summernote css/js -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 200
            });
        });
    </script>
@endsection