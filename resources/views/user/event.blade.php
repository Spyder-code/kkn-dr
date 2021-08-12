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
                    <p class="title-banner"><b>Lomba Video Kreatif</b></p>
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
                    <form action="{{ route('event-c.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 pt-0">
                            <label>Nama Lengkap</label><sup class="text-red-500">*</sup>
                            <input type="text" name="name" class="mt-2 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 relative bg-white bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:ring w-full" value="{{ old('name') }}"/>
                        </div>
                        <div class="mb-3 pt-0">
                            <label>Alamat</label><sup class="text-red-500">*</sup>
                            <input type="text" name="address" class="mt-2 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 relative bg-white bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:ring w-full" value="{{ old('address') }}"/>
                        </div>
                        <div class="mb-3 pt-0">
                            <label>Nomor (WhatsApp)</label><sup class="text-red-500">*</sup>
                            <input type="text" name="phone" class="mt-2 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 relative bg-white bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:ring w-full" value="{{ old('phone') }}"/>
                        </div>
                        <hr>
                        <div class="mb-3 pt-0 mt-5">
                            <label>Judul Video</label><sup class="text-red-500">*</sup>
                            <input type="text" name="title" class="mt-2 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 relative bg-white bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:ring w-full" value="{{ old('title') }}"/>
                        </div>
                        <div class="mb-3 pt-0">
                            <label>Deskripsi</label><sup class="text-red-500">*</sup><br>
                            <textarea name="description" class="mt-2 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 relative bg-white bg-white rounded text-sm border border-blue gray-300 outline-none focus:outline-none focus:ring w-full" cols="30" rows="10">{{  old('description')  }}</textarea>
                        </div>
                        <div class="mb-3 pt-0">
                            <label>File Video (Max: 10MB)</label><sup class="text-red-500">*</sup><br>
                            <input type="file" name="file" id="file1" onchange="uploadFile()"><br>
                            <progress id="progressBar" value="0" max="100" style="width:300px;"></progress>
                            <h3 id="status"></h3>
                        </div>
                        <div class="mb-3 pt-0">
                            <label>Persetujuan Syarat dan Kebijakan Mengikuti Lomba</label><sup class="text-red-500">*</sup><br>
                            <hr>
                            <label for="check" class="mt-4">
                                <input type="checkbox" id="check"> <small>Saya setuju mengikuti lomba ini dan juga bersedia untuk memberi izin pihak penyedia untuk mempublikasikan karya saya.</small>
                            </label>
                        </div>
                        <div class="mb-3 pt-0" id="submit">
                            <button type="submit" class="py-2 px-20 rounded-full bg-green-400 text-white hover:bg-green-700">Kirim</button>
                        </div>
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

@section('script')
    <script>
        function _(el) {
        return document.getElementById(el);
        }

        function uploadFile() {
        var file = _("file1").files[0];
        // alert(file.name+" | "+file.size+" | "+file.type);
        var formdata = new FormData();
        formdata.append("file1", file);
        var ajax = new XMLHttpRequest();
        ajax.upload.addEventListener("progress", progressHandler, false);
        ajax.addEventListener("load", completeHandler, false);
        ajax.addEventListener("error", errorHandler, false);
        ajax.addEventListener("abort", abortHandler, false);
        ajax.open("POST", "file_upload_parser.php"); // http://www.developphp.com/video/JavaScript/File-Upload-Progress-Bar-Meter-Tutorial-Ajax-PHP
        //use file_upload_parser.php from above url
        ajax.send(formdata);
        }

        function progressHandler(event) {
        // _("loaded_n_total").innerHTML = "Uploaded " + event.loaded + " bytes of " + event.total;
        var percent = (event.loaded / event.total) * 100;
        _("progressBar").value = Math.round(percent);
        _("status").innerHTML = Math.round(percent) + "% uploaded... please wait";
        }

        function completeHandler(event) {
        _("status").innerHTML = event.target.responseText;
        _("progressBar").value = 0; //wil clear progress bar after successful upload
        }

        function errorHandler(event) {
        _("status").innerHTML = "Upload Failed";
        }

        function abortHandler(event) {
        _("status").innerHTML = "Upload Aborted";
        }

    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
        $('#submit').hide();
        $('input[type="checkbox"]').click(function(){
            if($(this).prop("checked") == true){
                $('#submit').show();
            }
            else if($(this).prop("checked") == false){
                $('#submit').hide();
            }
        });
    </script>
@endsection
