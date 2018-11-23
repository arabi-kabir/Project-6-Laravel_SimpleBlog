<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Category;
use App\Post;

class FrontendController extends Controller
{
    public function index()
    {
        return view('index', [
            'title' => Setting::first()->site_name,
            'categories' => Category::take(7)->get(),
            'first_post' => Post::orderBy('created_at', 'desc')->first(),
            'second_post' => Post::orderBy('created_at', 'desc')->skip(1)->take(1)->get()->first(),
            'third_post' => Post::orderBy('created_at', 'desc')->skip(2)->take(1)->get()->first(),
            'posts' => Post::orderBy('created_at', 'desc')->get(),
        ]);
    }
}
