@extends('layouts.user')
@section('content')
    <!-- Banner -->
    <section class="py-5 px-20 banner">
        <div class="flex justify-center mt-28 md:mt-20">
            <div class="text-center">
                <div class="md:mt-40">
                    <p class="title-banner"><b>OPTIMALISASI MEDIA DIGITAL DALAM PENCEGAHAN COVID-19 DI KELURAHAN MERI KOTA MOJOKERTO</b></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Content -->
    <section class="mt-10 px-4 md:px-24 py-10 content">
        <div class="flex flex-col md:flex-row">
            <div class="w-full md:w-3/4 md:mr-10">
                @if ($video->count()==0 && $article->count()==0)
                    <p class="text-3xl my-4 text-center text-blue-500">Data Tidak Ditemukan!</p>
                @endif
                <!-- Web App -->
                @if ($video->count()>0)
                <p class="text-3xl my-4">Videos</p>
                <hr>
                <br>
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
                @endif
                <!-- End Web App -->

                <!-- Mobile App -->
                @if ($article->count()>0)
                <p class="text-3xl my-4">Article</p>
                <hr>
                <br>
                <div class="grid grid-cols-1 md:grid-cols-2">
                        @foreach ($article as $item)
                        <div class="item-app p-5 rounded-xl">
                            <img src="{{ $item->image }}" class="h-48 w-full" alt="{{ $item->title }}">
                            <div class="text-center mt-3">
                                <h2 class="text-l mt-5"><a href="{{ route('article.read',['article'=>$item->id]) }}">{{ $item->title }}</a></h2>
                                <div class="flex flex-wrap justify-center my-2">
                                    @foreach ($item->label as $label_item)
                                        <a href="" class="mr-3 text-xs text-blue-400">#{{ $label_item->label->name}}</a>
                                    @endforeach
                                </div>
                                <hr>
                                <div class="flex mt-4 justify-center text-primary">
                                    <div class="mr-5">
                                        <span><i class="uil uil-eye"></i> {{ $item->viewer }} Views</span>
                                    </div>
                                    <div class="mr-5">
                                        <span><i class="uil uil-share"></i> 200 Share</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                </div>
                @endif
                <!-- End Mobile App -->
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
