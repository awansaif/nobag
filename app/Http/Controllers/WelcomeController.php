<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\BlogCategory;
use App\Models\SellerBlog;
use App\Models\Team;
use App\Models\Trip;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'trips' => Trip::orderBy('id', 'DESC')->take(4)->get(),
        ]);
    }

    public function blogs()
    {
        return view('public.pages.blog.blogs', [
            'articles' => Article::query()
                ->with('category', 'tags')
                ->latest()
                ->take(4)
                ->get(),
        ]);
    }
    public function single_blog($id)
    {
        return view('public.pages.blog.single-blog', [
            'blog' => Article::find($id)
        ]);
    }

    public function trips()
    {
    }
    public function single_trip($id)
    {
        return view('public.pages.trip.signle', [
            'trip' => Trip::find($id)
        ]);
    }

    public function about_us()
    {
        return view('public.pages.about-us.index', [
            'teamMembers' => Team::get()
        ]);
    }

    public function contact_us()
    {
        return view('public.pages.contact-us.index');
    }
}
