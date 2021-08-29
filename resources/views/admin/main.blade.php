@extends('layouts.admin')
@section('page','Dashboard')
@section('breadcrumb')
    <li><a href="#" class="fw-normal">Dashboard</a></li>
@endsection

@section('content')
    <div class="dash-wrapper bg-dark">
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-5 row-cols-xxl-5">
            <div class="col border-end border-light-2">
                <div class="card bg-transparent shadow-none mb-0">
                    <div class="card-body text-center">
                    <p class="mb-1 text-white">Articles</p>
                    <h3 class="mb-3 text-white">{{ $article->count() }}</h3>
                    <p class="font-13 text-white">Total Seluruh Article</p>
                    <div id="chart1"></div>
                    </div>
                </div>
            </div>
            <div class="col border-end border-light-2">
            <div class="card bg-transparent shadow-none mb-0">
                <div class="card-body text-center">
                    <p class="mb-1 text-white">Videos</p>
                    <h3 class="mb-3 text-white">{{ $video->count() }}</h3>
                    <p class="font-13 text-white">Total Seluruh Video</p>
                    <div id="chart2"></div>
                </div>
            </div>
        </div>
        <div class="col border-end border-light-2">
            <div class="card bg-transparent shadow-none mb-0">
                <div class="card-body text-center">
                    <p class="mb-1 text-white">Page Views</p>
                    <h3 class="mb-3 text-white">{{ $article->sum('viewer') }}</h3>
                    <p class="font-13 text-white">Total Seluruh Viewer Article</p>
                    <div id="chart3"></div>
                </div>
            </div>
        </div>
        <div class="col border-end border-light-2">
            <div class="card bg-transparent shadow-none mb-0">
                <div class="card-body text-center">
                    <p class="mb-1 text-white">Visitor</p>
                    <h3 class="mb-3 text-white">{{ $visitor->sum('count') }}</h3>
                    <p class="font-13 text-white">Total Seluruh Pengunjung Website</p>
                    <div id="chart4"></div>
                </div>
            </div>
        </div>
        <div class="col col-md-12">
            <div class="card bg-transparent shadow-none mb-0">
                <div class="card-body text-center">
                    <p class="mb-1 text-white">Unique Visitor</p>
                    <h3 class="mb-3 text-white">{{ $visitor->count() }}</h3>
                    <p class="font-13 text-white">Total Seluruh Pengunjung Baru</p>
                    <div id="chart5"></div>
                </div>
            </div>
        </div>
        </div><!--end row-->
        <div class="row text-center">
            <h2 class="text-white">Reviewer</h2>
            <p class="text-white">({{ $positive + $negative }})</p>
            <hr>
            <div class="col text-white">
                <h3 class="text-white">Positive</h3>
                <p>{{ $positive_persentase }}%</p>
                <hr>
                <p>{{ $positive }} Reviewer</p>
            </div>
            <div class="col text-white">
                <h3 class="text-white">Negative</h3>
                <p>{{ $negative_persentase }}%</p>
                <hr>
                <p>{{ $negative }} Reviewer</p>
            </div>
        </div>
    </div>
@endsection
