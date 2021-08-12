<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleLabel;
use App\Models\Category;
use App\Models\Label;
use App\Models\Video;
use App\Models\VideoLabel;
use Illuminate\Http\Request;
use Butschster\Head\Facades\Meta;

class PageController extends Controller
{
    public function __construct()
    {
        $this->popular_post = Article::all()->sortByDesc('viewer')->take(3);
        $this->category = Category::all();
        $this->label = Label::all();

    }

    public function index()
    {
        Meta::setTitle('Kader kesehatan kelurahan meri')
            ->prependTitle('Home')
            ->setDescription('OPTIMALISASI MEDIA DIGITAL DALAM PENCEGAHAN COVID-19 DI KELURAHAN MERI KOTA MOJOKERTO')
            ->setKeywords('OPTIMALISASI, MEDIA DIGITAL, DALAM PENCEGAHAN COVID-19, DI KELURAHAN MERI, KOTA MOJOKERTO');

        $popular_post = $this->popular_post;
        $category = $this->category;
        $label = $this->label;
        $article =  Article::all()->sortByDesc('created_at')->take(2);
        $video =  Video::all()->sortByDesc('created_at')->take(2);
        return view('user.home',compact('article','video','label','category','popular_post'));
    }

    public function article()
    {
        Meta::setTitle('Kader kesehatan kelurahan meri')
                ->prependTitle('Article')
                ->setDescription('OPTIMALISASI MEDIA DIGITAL DALAM PENCEGAHAN COVID-19 DI KELURAHAN MERI KOTA MOJOKERTO')
                ->setKeywords('OPTIMALISASI, MEDIA DIGITAL, DALAM PENCEGAHAN COVID-19, DI KELURAHAN MERI, KOTA MOJOKERTO')
;
        $popular_post = $this->popular_post;
        $category = $this->category;
        $label = $this->label;
        $article =  Article::all();
        $main_article =  Article::latest('created_at')->first();
        return view('user.article',compact('article','main_article','label','category','popular_post'));
    }

    public function article_read(Article $article)
    {
        Meta::setTitle($article->title)
            ->setDescription('OPTIMALISASI MEDIA DIGITAL DALAM PENCEGAHAN COVID-19 DI KELURAHAN MERI KOTA MOJOKERTO')
            ->setKeywords('OPTIMALISASI, MEDIA DIGITAL, DALAM PENCEGAHAN COVID-19, DI KELURAHAN MERI, KOTA MOJOKERTO');
        $popular_post = $this->popular_post;
        $category = $this->category;
        $label = $this->label;
        Article::find($article->id)->update(['viewer'=>$article->viewer + 1]);
        return view('user.article_read',compact('article','label','category','popular_post'));
    }

    public function video()
    {
        Meta::setTitle('Kader kesehatan kelurahan meri')
            ->prependTitle('Video')
            ->setDescription('OPTIMALISASI MEDIA DIGITAL DALAM PENCEGAHAN COVID-19 DI KELURAHAN MERI KOTA MOJOKERTO')
            ->setKeywords('OPTIMALISASI, MEDIA DIGITAL, DALAM PENCEGAHAN COVID-19, DI KELURAHAN MERI, KOTA MOJOKERTO');
        $popular_post = $this->popular_post;
        $category = $this->category;
        $label = $this->label;
        $video =  Video::all();
        $main_video =  Video::latest('created_at')->first();
        return view('user.video',compact('video','main_video','label','category','popular_post'));
    }

    public function search_label($name)
    {
        Meta::setTitle('Kader kesehatan kelurahan meri')
            ->prependTitle('Search '.$name)
            ->setDescription('OPTIMALISASI MEDIA DIGITAL DALAM PENCEGAHAN COVID-19 DI KELURAHAN MERI KOTA MOJOKERTO')
            ->setKeywords('OPTIMALISASI, MEDIA DIGITAL, DALAM PENCEGAHAN COVID-19, DI KELURAHAN MERI, KOTA MOJOKERTO');
        $label_data = Label::where('name',$name)->first();
        $popular_post = $this->popular_post;
        $category = $this->category;
        $label = $this->label;
        $article_label = ArticleLabel::all()->where('label_id',$label_data->id);
        $video_label = VideoLabel::all()->where('label_id',$label_data->id);
        $id_article = array();
        $id_video = array();
        foreach ($article_label as $item ) {
            array_push($id_article,$item->article_id);
        };
        foreach ($video_label as $item ) {
            array_push($id_video,$item->video_id);
        };
        $article =  Article::all()->whereIn('id',$id_article);
        $video =  Video::all()->whereIn('id',$id_video);
        return view('user.search',compact('article','video','label','category','popular_post'));
    }

    public function search_category($name)
    {
        Meta::setTitle('Kader kesehatan kelurahan meri')
            ->prependTitle('Search '.$name)
            ->setDescription('OPTIMALISASI MEDIA DIGITAL DALAM PENCEGAHAN COVID-19 DI KELURAHAN MERI KOTA MOJOKERTO')
            ->setKeywords('OPTIMALISASI, MEDIA DIGITAL, DALAM PENCEGAHAN COVID-19, DI KELURAHAN MERI, KOTA MOJOKERTO');
        $category_data = Category::where('name',$name)->first();
        $popular_post = $this->popular_post;
        $category = $this->category;
        $label = $this->label;
        $article =  Article::all()->where('category_id',$category_data->id);
        $video =  Video::all()->where('category_id',$category_data->id);
        return view('user.search',compact('article','video','label','category','popular_post'));
    }

    public function event()
    {
        Meta::setTitle('Kader kesehatan kelurahan meri')
            ->prependTitle('Event')
            ->setDescription('OPTIMALISASI MEDIA DIGITAL DALAM PENCEGAHAN COVID-19 DI KELURAHAN MERI KOTA MOJOKERTO')
            ->setKeywords('OPTIMALISASI, MEDIA DIGITAL, DALAM PENCEGAHAN COVID-19, DI KELURAHAN MERI, KOTA MOJOKERTO');
        $popular_post = $this->popular_post;
        $category = $this->category;
        $label = $this->label;
        return view('user.event', compact('popular_post','category','label'));
    }

    public function instagram()
    {
        Meta::setTitle('Kader kesehatan kelurahan meri')
            ->prependTitle('Instagram')
            ->setDescription('OPTIMALISASI MEDIA DIGITAL DALAM PENCEGAHAN COVID-19 DI KELURAHAN MERI KOTA MOJOKERTO')
            ->setKeywords('OPTIMALISASI, MEDIA DIGITAL, DALAM PENCEGAHAN COVID-19, DI KELURAHAN MERI, KOTA MOJOKERTO');
        $popular_post = $this->popular_post;
        $category = $this->category;
        $label = $this->label;
        return view('user.instagram', compact('popular_post','category','label'));
    }
}
