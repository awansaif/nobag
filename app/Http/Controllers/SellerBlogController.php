<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use App\Models\SellerBlog;
use App\Models\SellerBlogTag;
use App\Models\SellerProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('seller.pages.blog.index', [
            'profile' => SellerProfile::query()
                ->where('seller_id', Auth::guard('seller')->user()->id)
                ->select('self_description')
                ->first(),
            'blogs'  => SellerBlog::query()
                ->with('category', 'tags')
                ->where('seller_id', Auth::guard('seller')->user()->id)
                ->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('seller.pages.blog.create', [
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
        // dd($request->all());
        // foreach ($request->tags as $tag) {
        //     dd($tag);
        // }
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'body'     => 'required',
            'tags'     => 'required',
            'featured_image' => 'required|image',
        ]);

        $destination = 'blog-images/';
        $image = $request->file('featured_image');
        $image_new = time() . $image->getClientOriginalName();
        $image->move($destination, $image_new);


        $blog = SellerBlog::create([
            'seller_id' => Auth::guard('seller')->user()->id,
            'title'     => $request->title,
            'category_id'  => $request->category,
            'body'      => $request->body,
            'featured_image' => $destination . $image_new
        ]);
        foreach ($request->tags as $tag) {
            SellerBlogTag::create([
                'seller_blog_id' => $blog->id,
                'tag_title'      => $tag
            ]);
        }

        $request->session()->flash('message', 'Blog added successfully');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SellerBlog  $sellerBlog
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return view('seller.pages.blog.show', [
            'blog' => SellerBlog::with('category', 'tags')
                ->where('id', $id)
                ->first()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SellerBlog  $sellerBlog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('seller.pages.blog.update', [
            'categories' => BlogCategory::orderBy('id', 'DESC')
                ->get(),
            'blog' => SellerBlog::with('category', 'tags')
                ->where('id', $id)
                ->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SellerBlog  $sellerBlog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'body'     => 'required',
            'tags'     => 'required',
            'featured_image' => 'nullable|image',
        ]);

        SellerBlogTag::where('seller_blog_id', $id)->delete();
        if ($request->hasFile('featured_image')) {

            $destination = 'blog-images/';
            $image = $request->file('featured_image');
            $image_new = time() . $image->getClientOriginalName();
            $image->move($destination, $image_new);


            $blog = SellerBlog::find($id);
            $blog->title = $request->title;
            $blog->category_id = $request->category;
            $blog->body = $request->body;
            $blog->featured_image = $destination . $image_new;
            $blog->save();

            foreach ($request->tags as $tag) {
                SellerBlogTag::create([
                    'seller_blog_id' => $blog->id,
                    'tag_title'      => $tag
                ]);
            }
        } else {
            $blog = SellerBlog::find($id);
            $blog->title = $request->title;
            $blog->category_id = $request->category;
            $blog->body = $request->body;
            $blog->save();

            foreach ($request->tags as $tag) {
                SellerBlogTag::create([
                    'seller_blog_id' => $blog->id,
                    'tag_title'      => $tag
                ]);
            }
        }
        $request->session()->flash('message', 'Blog updated successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SellerBlog  $sellerBlog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $blog = SellerBlog::findorFail($id);
        $blog->delete();
        SellerBlogTag::where('seller_blog_id', $blog->id)->delete();
        return back();
    }
}
