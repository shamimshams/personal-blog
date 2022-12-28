<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    function index($posttag = null)
    {
        Cache::forget('all_articles');
        $data['articles'] = Cache::remember('all_articles', 86400, function () use ($posttag) {
            return Post::query()->with(['tags'])
                ->published()
                ->when($posttag, fn ($q, $search) => $q->whereHas('tags', fn ($qry) => $qry->where('slug', $posttag)))
                ->simplePaginate(10);
        });

        return view('home.index', $data);
    }


    function details(string $slug)
    {
        $data['article'] = Post::query()->with(['tags'])->published()->where('slug', $slug)->firstOrFail();
        return view('details.index', $data);
    }

    function tags()
    {
        $data['title'] = 'Tags';
        $data['tags'] = Tag::withCount('posts')->get('id', 'name');
        return view('tags.index', $data);
    }

    function about()
    {
        $data['title'] = 'About Me';
        return view('about.index', $data);
    }
}