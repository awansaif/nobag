<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use App\Models\SellerBlog;
use App\Models\Team;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function blogs()
    {
        return view('public.pages.blog.blogs', [
            'articles' => SellerBlog::query()
                ->with('category', 'tags')
                ->latest()
                ->take(4)
                ->get(),
        ]);
    }
    public function single_blog($id)
    {
        return view('public.pages.blog.single-blog', [
            'blog' => SellerBlog::find($id)
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
