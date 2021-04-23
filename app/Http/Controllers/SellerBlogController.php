<?php

namespace App\Http\Controllers;

use App\Models\SellerBlog;
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
            'profile' => SellerProfile::where('seller_id', Auth::guard('seller')->user()->id)->select('self_description')->first()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('seller.pages.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
        foreach ($request->tags as $tag) {
            dd($tag);
        }
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'body'     => 'required',
            'tags'     => 'required',
            'featured_image' => 'required|image',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SellerBlog  $sellerBlog
     * @return \Illuminate\Http\Response
     */
    public function show(SellerBlog $sellerBlog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SellerBlog  $sellerBlog
     * @return \Illuminate\Http\Response
     */
    public function edit(SellerBlog $sellerBlog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SellerBlog  $sellerBlog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SellerBlog $sellerBlog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SellerBlog  $sellerBlog
     * @return \Illuminate\Http\Response
     */
    public function destroy(SellerBlog $sellerBlog)
    {
        //
    }
}
