@extends('layouts.user')
@section('nav-event','active-link')
@section('style')
        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ route('user.event') }}">
        <meta property="og:title" content="LOMBA VIDEO KREATIF">
        <meta property="og:description" content="KADER KESEHATAN MERI | LOMBA VIDEO KREATIF">
        <meta property="og:image" content="{{ asset('images/event.jpeg') }}">

        <!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="{{ route('user.event') }}">
        <meta property="twitter:title" content="LOMBA VIDEO KREATIF">
        <meta property="twitter:description" content="KADER KESEHATAN MERI | LOMBA VIDEO KREATIF">
        <meta property="twitter:image" content="{{ asset('images/event.jpeg') }}">

@endsection
@section('content')
    <!-- Banner -->
    <section class="py-5 px-5 lg:px-20 banner">
        <div class="flex justify-center md:mt-20">
            <div class="text-center">
                <div class="md:mt-40">
                    <p class="title-banner"><b>Beri Kami Dukungan Supaya Jadi Lebih Baik</b></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Content -->
    <section class="mt-10 px-4 md:px-24 py-10 content">
        <div class="flex flex-col md:flex-row">
            <div class="w-full md:w-3/4 md:mr-10">
                <div class="border bg-primary rounded p-10 border-blue-200 mt-5 md:mt-1">
                @if ($message = Session::get('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-5" role="alert">
                    <strong class="font-bold">{{ $message }}</strong>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                    </span>
                </div>
                @endif
                @if ($message = Session::get('danger'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-5" role="alert">
                    <strong class="font-bold">{{ $message }}</strong>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                    </span>
                </div>
                @endif
                @if ($status==1)
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-5" role="alert">
                    <strong class="font-bold">Terima kasih atas dukungannya, anda telah memberikan masukan buat kami</strong>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                    </span>
                </div>
                @endif

                @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-5" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li><strong class="font-bold">{{ $error }}</strong></li>
                        @endforeach
                    </ul>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                    </span>
                </div>
                @endif
                    <form action="{{ route('review.store') }}" method="post">
                        @csrf
                        <div class="mb-3 pt-0">
                            <p>Apakah menurut anda website ini dapat membuat masyarakat akan hal dibawah ini:</p>
                            <ol class="list-decimal ml-10">
                                <li>Mempermudah masyarakat dalam memperoleh informasi mengenai COVID-19 dan berita-berita kesehatan</li>
                                <li>Masyarakat dapat terhindar dari penularan COVID-19 karena mengetahui banyak informasi-informasi seputar COVID-19</li>
                                <li>Menumbuhkan kesadaran pada masyarakat tentang bagaimana pentingnya menjaga kesehatan</li>
                            </ol>
                        </div>
                        @if ($status==0)
                        <div class="mb-3 pt-0 flex justify-center" id="submit">
                            <button onclick="return confirm('Apakah anda yakin?')" name="review" value="1" type="submit" class="py-2 px-10 md:px-20 mr-3 rounded-full bg-green-400 text-white hover:bg-green-700">Iya</button>
                            <button onclick="return confirm('Apakah anda yakin?')" name="review" value="0" type="submit" class="py-2 px-10 md:px-20 rounded-full bg-red-400 text-white hover:bg-red-700">Tidak</button>
                        </div>
                        @endif
                    </form>
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
