<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleTag;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('editor.pages.article.index', [
            'artilcess' => Article::with('category', 'tags')->where('author', auth()->guard('editor')->user()->id)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('editor.pages.article.create', [
            'categories' => BlogCategory::orderBy('id', 'DESC')->get()
        ]);
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
            'title' => 'required',
            'category' => 'required',
            'body'     => 'required',
            'tags'     => 'required',
            'image' => 'required|image',
        ]);

        $destination = 'images/';
        $image = $request->file('image');
        $image_new = time() . $image->getClientOriginalName();
        $image->move($destination, $image_new);


        $blog = Article::create([
            'author' => auth()->guard('editor')->user()->id,
            'title'     => $request->title,
            'category_id'  => $request->category,
            'body'      => $request->body,
            'featured_image' => $destination . $image_new
        ]);
        foreach ($request->tags as $tag) {
            ArticleTag::create([
                'article_id' => $blog->id,
                'tag'      => $tag
            ]);
        }

        $request->session()->flash('message', 'Article added successfully');
        return back();
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
        return view('editor.pages.article.edit', [
            'categories' => BlogCategory::orderBy('id', 'DESC')->get(),
            'article' => $article
        ]);
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
            'title' => 'required',
            'category' => 'required',
            'body'     => 'required',
            'tags'     => 'required',
            'image' => 'nullable|image',
        ]);

        ArticleTag::where('article_id', $article->id)->delete();
        if ($request->hasFile('featured_image')) {

            $destination = 'images/';
            $image = $request->file('image');
            $image_new = time() . $image->getClientOriginalName();
            $image->move($destination, $image_new);


            $article->update([
                'title' => $request->title,
                'category_id' => $request->category,
                'body' => $request->body,
                'featured_image' => $destination . $image_new,
            ]);

            foreach ($request->tags as $tag) {
                ArticleTag::create([
                    'article_id' => $article->id,
                    'tag'      => $tag
                ]);
            }
        } else {
            $article->update([
                'title' => $request->title,
                'category_id' => $request->category,
                'body' => $request->body,
            ]);

            foreach ($request->tags as $tag) {
                ArticleTag::create([
                    'article_id' => $article->id,
                    'tag'      => $tag
                ]);
            }
        }
        $request->session()->flash('message', 'Article updated successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Article $article)
    {
        $article->delete();
        ArticleTag::where('article_id', $article->id)->delete();
        $request->session()->flash('message', 'Article removed successfully');
        return back();
    }
}
