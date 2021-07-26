@extends('layouts.user')
@section('nav-article','active-link')

@section('style')
        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ url('/') }}">
        <meta property="og:title" content="{{ $article->title }}">
        <meta property="og:description" content="OPTIMALISASI MEDIA DIGITAL DALAM PENCEGAHAN COVID-19 DI KELURAHAN MERI KOTA MOJOKERTO">
        <meta property="og:image" content="{{ $article->image }}">
    
        <!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="{{ url('/') }}">
        <meta property="twitter:title" content="{{ $article->title }}">
        <meta property="twitter:description" content="OPTIMALISASI MEDIA DIGITAL DALAM PENCEGAHAN COVID-19 DI KELURAHAN MERI KOTA MOJOKERTO">
        <meta property="twitter:image" content="{{ $article->image }}">

@endsection

@section('content')
    <!-- Content -->
    <section class="mt-10 px-4 md:px-24 py-10 content">
        <div class="flex flex-col md:flex-row">
            <div class="w-full md:w-3/4 md:mr-10">
                <!-- Article -->
                <div class="item-app p-5">
                    <div class="flex my-4 justify-between">
                        <h1 class="text-3xl text-primary text-center">{{ $article->title }}</h1>
                        <div class="mr-5 mt-5">
                            <span><i class="uil uil-calendar"></i> Upload on {{ date('d F Y', strtotime($article->created_at)) }}</span>
                        </div>
                    </div>
                    <hr>
                    <img src="{{ $article->image }}" alt="{{ $article->title }}" class="w-full h-90">

                    <div class="p-5">
                        {!! $article->content !!}
                        @if ($article->video_id!=null)
                        <iframe class=" w-full h-80" src="{{ $article->video->embed}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        @endif
                    </div>
                </div>
                <!-- End Article -->
                
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