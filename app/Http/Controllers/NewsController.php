<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $user = Auth::user();

        if ($user) {
            $allNews = $user->news->sortDesc();
        } else {
            $allNews = [];
        }

        return view(
            'news.index',
            [
                'title' => 'My News List',
                'allNews' => $allNews
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('news.create', [
            'title' => 'Post News',
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'max:255'],
            'slug' => ['required', 'unique:news'],
            'category_id' => 'required',
            'body' => 'required'
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        News::create($validatedData);

        return redirect('/news')->with('success', 'News Created Successfully !');
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        return view('news.detail', [
            'news' => $news
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        return view('news.edit', [
            'title' => 'Update News',
            'news' => $news,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        $rules =[
            'title' => ['required', 'max:255'],
            'category_id' => 'required',
            'body' => 'required'
        ];

        if($request->slug != $news->slug){
            $rules['slug'] =  ['required', 'unique:news'];
        }

        $validatedData = $request->validate($rules);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        News::where('id', $news->id)
            ->update($validatedData);
        return redirect('/news')->with('success', 'News has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        News::destroy($news->id);
        return redirect('/news')->with('success', 'News has been deleted.');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(News::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
