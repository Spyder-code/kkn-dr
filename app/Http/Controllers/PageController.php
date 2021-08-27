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
use Illuminate\Support\Facades\Http;

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
        $cat = ['title','id','category_id','created_at','content'];
        $article =  Article::inRandomOrder($cat[rand(0,4)])->paginate(4);
        // $article =  Article::all()->sortByDesc('created_at')->take(4);
        // $video =  Video::all()->sortByDesc('created_at')->take(4);
        $catt = ['title','id','description','created_at'];
        $video =  Video::inRandomOrder($catt[rand(0,3)])->paginate(4);
        return view('user.home',compact('article','video','label','category','popular_post'));
    }

    public function article()
    {
        Meta::setTitle('Kader kesehatan kelurahan meri')
                ->prependTitle('Article')
                ->setDescription('OPTIMALISASI MEDIA DIGITAL DALAM PENCEGAHAN COVID-19 DI KELURAHAN MERI KOTA MOJOKERTO')
                ->setKeywords('OPTIMALISASI, MEDIA DIGITAL, DALAM PENCEGAHAN COVID-19, DI KELURAHAN MERI, KOTA MOJOKERTO');
        // $link = ['berita','masyarakat-umum','panduan','melakukan-perjalanan','tenaga-kesehatan','pengusaha-dan-bisnis','hoax-buster','protokol','regulasi','tanya-jawab','artikel-kipi','kipi'];
        // $i = 2;
        // foreach ($link as $item ) {
        //     $this->getDataArticle('https://covid19.go.id/feed/'.$item,$i);
        //     $i++;
        // };
        $popular_post = $this->popular_post;
        $category = $this->category;
        $label = $this->label;
        $cat = ['title','id','category_id','created_at','content'];
        $article =  Article::inRandomOrder($cat[rand(0,4)])->paginate(6);
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
        // $this->getDataVideo();
        Meta::setTitle('Kader kesehatan kelurahan meri')
            ->prependTitle('Video')
            ->setDescription('OPTIMALISASI MEDIA DIGITAL DALAM PENCEGAHAN COVID-19 DI KELURAHAN MERI KOTA MOJOKERTO')
            ->setKeywords('OPTIMALISASI, MEDIA DIGITAL, DALAM PENCEGAHAN COVID-19, DI KELURAHAN MERI, KOTA MOJOKERTO');
        $popular_post = $this->popular_post;
        $category = $this->category;
        $label = $this->label;
        $cat = ['title','id','description','created_at'];
        $video =  Video::inRandomOrder($cat[rand(0,3)])->paginate(6);
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

    public function getDataArticle($urlGet,$type)
    {
        $parseFile = simplexml_load_file($urlGet,'SimpleXMLElement', LIBXML_NOCDATA);
        $json = json_encode($parseFile);
        $array = json_decode($json);
        $berita_terkini = $array->channel->item;
        foreach ($berita_terkini as $item ) {
            $article = Article::all()->where('title',$item->title);
            if($article->count()==0){
                if ($type!=11) {
                    foreach ($item->enclosure as $en ) {
                        $url = $en->url;
                    }
                }else{
                    $url = 'https://miro.medium.com/max/2000/1*U6D-LTFsKb6_RMIoYZLSZQ.png';
                }
                Article::create([
                    'user_id' => 1,
                    'category_id' => $type,
                    'title' => $item->title,
                    'content' => $item->description,
                    'image' => $url,
                    'viewer' => rand(20,200),
                ]);
            };
        };
    }

    public function getDataVideo()
    {
        $response = Http::get('https://youtube.googleapis.com/youtube/v3/search?part=snippet&channelId=UCWBnPaPlVx2_h7Kdva52AYg&maxResults=100&order=date&key=AIzaSyAFwF_EuWdc7G_wz1oOF2aiMaHKPzHGz14');
        $array = json_decode($response->collect());
        $data = $array->items;
        foreach ($data as $item ) {
            $video = Video::all()->where('title',$item->snippet->title);
            if ($video->count()==0) {
                Video::create([
                    'title' => $item->snippet->title,
                    'description' => $item->snippet->description,
                    'embed' => 'https://www.youtube.com/embed/'.$item->id->videoId,
                    'link' => 'https://youtu.be/'.$item->id->videoId,
                ]);
            }
        }
    }
}
