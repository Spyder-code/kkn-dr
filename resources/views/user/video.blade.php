@extends('layouts.user')
@section('nav-video','active-link')
@section('content')
    <!-- Banner -->
    <section class="py-5 px-5 lg:px-20 banner">
        <div class="flex justify-center md:mt-20">
            <div class="text-center">
                <div class="grid grid-cols-1 md:grid-cols-2 text-center">
                    <iframe class="h-48 mr-20 mt-10 md:h-64 video-main" src="{{ $main_video->embed }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <div class="md:mt-20 text-white">
                        <a href="" class="text-xl md:text-3xl">{{ $main_video->title }}</a>
                        <div class="mt-5">
                            <a href="{{ $main_video->link }}" class="py-2 px-10 bg-red-800 rounded-full mt-5 text-white"><i class="uil uil-youtube"></i> View on Youtube</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Content -->
    <section class="mt-10 px-4 md:px-24 py-10 content">
        <div class="flex flex-col md:flex-row">
            <div class="w-full md:w-3/4 md:mr-10">
                <!-- Videos -->
                <div class="grid grid-cols-1 md:grid-cols-2">
                    @foreach ($video as $item)
                    <div class="item-app p-5 rounded-xl">
                        <iframe class=" w-full h-48" src="{{ $item->embed }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <div class="text-center mt-3">
                            <h2 class="text-l"><a href="{{ $item->link }}">{{ $item->title }}</a></h2>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- End Videos -->
                <div class="m-10">
                    {{ $video->links() }}
                </div>
            </div>
            <!-- Right Content -->
            <div class="w-full md:w-1/4">

                <!-- Popular Post -->
                <div class="border bg-primary border-blue-200 mt-5 md:mt-1">
                    <div class="py-2 text-center border-b border-blue-200">
                        Popular Post
                    </div>
                    @foreach ($popular_post as $item)
                    <div class="item p-3 flex justify-between">
                        <div class="img w-1/2">
                            <img src="{{ $item->image }}" class="h-14 w-full">
                        </div>
                        <div class="mx-3 text-justify w-1/2">
                            <a href="{{ route('article.read',['article'=>$item->id]) }}"><small>{{ $item->title }}</small></a>
                            {{-- <p><small>Lorem ipsum dolor sit amet consectetur adipisicing elit</small></p> --}}
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Category -->
                <div class="border bg-primary mt-10 border-blue-200">
                    <div class="py-2 border-b border-blue-200 text-center">
                        Category
                    </div>
                    @foreach ($category as $item)
                    <div class="text-xs border-b-2 border-blue-400 item p-3 flex justify-between">
                        <a href="{{ route('user.search.category',['name'=>$item->name]) }}"> > {{ $item->name }}</a>
                        <span>({{ $item->article->count() }})</span>
                    </div>
                    @endforeach
                </div>

                <!-- Labels -->
                <div class="border bg-primary border-blue-200 mt-10">
                    <div class="py-2 border-b border-blue-200 text-center">
                        Labels
                    </div>
                    <div class="flex flex-wrap text-xs p-4">
                        @foreach ($label as $item)
                            <div class="m-2 border border-blue-200 p-2 rounded-full">
                                <a href="{{ route('user.search.label',['name'=>$item->name]) }}">{{ $item->name }}</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
