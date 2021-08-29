<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Label;
use App\Models\Review;
use Illuminate\Http\Request;
use Butschster\Head\Facades\Meta;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
        Meta::setTitle('Beri Kami Dukungan Supaya Jadi Lebih Baik')
        ->setDescription('OPTIMALISASI MEDIA DIGITAL DALAM PENCEGAHAN COVID-19 DI KELURAHAN MERI KOTA MOJOKERTO')
        ->setKeywords('OPTIMALISASI, MEDIA DIGITAL, DALAM PENCEGAHAN COVID-19, DI KELURAHAN MERI, KOTA MOJOKERTO');
        $popular_post = Article::all()->sortByDesc('viewer')->take(3);
        $category = Category::all();
        $label = Label::all();
        $ip = $request->getClientIp();
        $data = Review::all()->where('ip',$ip)->count();
        if ($data==0) {
            $status = 0;
        }else{
            $status = 1;
        }
        return view('user.review', compact('status','popular_post','category','label'));
    }

    public function store(Request $request)
    {
        $ip = $request->getClientIp();
        Review::create([
            'ip' => $ip,
            'review' => $request->review
        ]);

        return back()->with('success','Terima kasih atas pendapatnya, semoga sehat selalu');
    }
}
