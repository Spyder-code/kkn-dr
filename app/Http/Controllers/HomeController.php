<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Review;
use App\Models\User;
use App\Models\Video;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $visitor = Visitor::all();
        $user = User::all();
        $article = Article::all();
        $video = Video::all();
        $review_count = Review::all()->count();
        $positive = Review::all()->where('review',1)->count();
        $negative = Review::all()->where('review',0)->count();
        $positive_persentase = number_format((float)($positive/$review_count) * 100, 2,'.','');
        $negative_persentase = number_format((float)($negative/$review_count) * 100, 2,'.','');
        return view('admin.main',compact('visitor','user','article','video','positive_persentase','negative_persentase','positive','negative'));
    }

    public function profile()
    {
        return view('admin.profile');
    }

}
