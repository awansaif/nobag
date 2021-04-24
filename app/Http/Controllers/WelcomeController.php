<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use App\Models\SellerBlog;
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

    public function about_us()
    {
        return view('public.pages.about-us.index');
    }

    public function contact_us()
    {
        return view('public.pages.contact-us.index');
    }
}
