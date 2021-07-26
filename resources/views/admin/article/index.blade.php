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
                        <a href="{{ route('article.create') }}" class="btn btn-primary"> <i class="bx bx-plus"></i> Add article</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table no-wrap">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">#</th>
                                        <th class="border-top-0">Title</th>
                                        <th class="border-top-0">Category</th>
                                        <th class="border-top-0">Created at</th>
                                        <th class="border-top-0">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->category->name }}</td>
                                        <td>{{ date('d/m/Y', strtotime($item->created_at)) }}</td>
                                        <td class="d-flex justify-content-center">
                                            <a href="{{ route('article.edit',['article'=>$item->id]) }}" class="mr-3 btn btn-primary text-white"> <i class="bx bx-pencil"></i> Edit</a>
                                            <a target="d_blank" href="{{ route('article.read',['article'=>$item->id]) }}" class="mr-3 btn btn-warning text-white"> <i class="bx bx-detail"></i> View</a>
                                            <form class="ml-3" action="{{ route('article.destroy',['article'=>$item->id]) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="mr-3 btn btn-danger ml-5" onclick="return confirm('Are you sure?')"><i class="bx bx-trash-alt"></i> Delete</button>
                                            </form>
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
@endsection