@extends('layouts.admin')

@section('style')
    <script src="https://cdn.tiny.cloud/1/ip0rkeafploig1u7xvh8y8bb0c7qg3gz1kesdzcwab09fnzx/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
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
                        <a href="{{ route('article.index') }}" class="btn btn-primary"> <i class="bx bx-arrow-back"></i> Back</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('article.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mt-3">
                                <label>Title</label><span class="text-danger">*</span>
                                <input value="{{ old('title') }}" type="text" name="title" class="form-control">
                            </div>
                            <div class="mt-3">
                                <label>Category</label><span class="text-danger">*</span>
                                <select name="category_id" class="form-control">
                                    <option></option>
                                    @foreach ($category as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mt-3">
                                <label>Content</label><span class="text-danger">*</span>
                                <textarea name="content">{{ old('content') }}</textarea>
                            </div>
                            <div class="mt-3">
                                <label>Label</label><span class="text-danger">*</span>
                                <div class="row">
                                    @foreach ($label as $item)
                                        <div class="col-2">
                                            <label class="mr-5">
                                                <input type="checkbox" name="label[]" value="{{ $item->id }}" class="form-check-inline"> <span>{{ $item->name }}</span>
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="mt-3">
                                <label>Image</label><span class="text-danger">*</span>
                                <input value="{{ old('image') }}" type="file" name="image">
                            </div>
                            <div class="mt-3">
                                <label>Videos</label>
                                <select name="video_id" class="form-control">
                                    <option></option>
                                    @foreach ($video as $item)
                                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-success"><i class="bx bx-save"></i> Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        tinymce.init({
        selector: 'textarea',
        plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
        toolbar_mode: 'floating',
    });
    </script>
@endsection