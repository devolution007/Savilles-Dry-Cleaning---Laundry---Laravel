<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Page;
use App\Models\Faq;

class BlogsController extends Controller
{
    public function index()
    {
        $pages = Page::orderBy('id', 'desc')->get();
        return view('blogs', [
            'blogs' => $pages
        ]);
    }

    public function show($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();
        return view('blog_detail', [
            'page' => $page
        ]);
    }
}
