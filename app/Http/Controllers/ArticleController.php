<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleLabel;
use App\Models\Category;
use App\Models\Label;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Article::all();
        return view('admin.article.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        $label = Label::all();
        $video = Video::all();
        return view('admin.article.newcreate',compact('category','label','video'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        if ($files = $request->file('image')) {
            $profileImage = $request->title.'.jpg';
            $path = $files->storeAs('public/article', $profileImage);
            $url = Storage::url($path);
            $imgUrl = url($url);
            $article = Article::create([
                'user_id' => Auth::id(),
                'category_id' => $request->category_id,
                'title' => $request->title,
                'content' => $request->content,
                'image' => $imgUrl,
                'viewer' => 0,
                'video_id' => $request->video_id
            ]);
            foreach ($request->label as $item) {
                ArticleLabel::create([
                    'label_id'=> $item,
                    'article_id' => $article->id
                ]);
            };
            return redirect()->route('article.index')->with('success','Data berhasil ditambahkan!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $category = Category::all();
        $video = Video::all();
        return view('admin.article.edit',compact('category','video','article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        $article = Article::find($article->id)->update($request->all());

        if ($files = $request->file('image')) {
            $profileImage = $request->title.'.jpg';
            $path = $files->storeAs('public/article', $profileImage);
            $url = Storage::url($path);
            $imgUrl = url($url);
            $article = Article::find($article->id)->update([
                'image' => $imgUrl,
            ]);
        }
        return redirect()->route('article.index')->with('success','Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        Article::destroy($article->id);
        return redirect()->route('article.index')->with('success','Data berhasil dihapus!');
    }
}
