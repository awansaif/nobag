<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        return view('admin.pages.article.index', [
            'artilcess' => Article::with('category', 'tags')->orderBy('id', 'DESC')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.pages.article.edit', [
            'categories' => BlogCategory::orderBy('id', 'DESC')->get(),
            'article' => Article::Find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'body'     => 'required',
            'tags'     => 'required',
            'image' => 'nullable|image',
        ]);
        $article = Article::Find($id);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $article = Article::find($id);
        $article->delete();
        ArticleTag::where('article_id', $article->id)->delete();
        $request->session()->flash('message', 'Article removed successfully');
        return back();
    }
}
