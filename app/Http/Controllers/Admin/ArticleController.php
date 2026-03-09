<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ArticleRequest;
use App\Models\Article;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index()
    {
        $query = Article::query();

        if (! empty(request('keyword'))) {
            $query = $query->where('title', 'like', '%' . request('keyword') . '%');
        }
        if (! empty(request('order'))) {
            $query = $query->orderBy('id', request('order'));
        }
        $articles = $query->paginate(9);

        return view('admin.articles.index', get_defined_vars());
    }

    public function create()
    {
        return view('admin.articles.create', get_defined_vars());
    }

    public function store(ArticleRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        $data['slug'] = Str::slug($data['title']);
        if ($request->hasFile('image')) {
            unset($data['image']);
            $data['image'] = $request->file('image')->store('admins/articles', 'public');
        }
        Article::create($data);

        return redirect()->route('admin.articles.index')->with('success', 'تم إضافة المقال بنجاح!');
    }

    public function show(Article $article)
    {
        return view('admin.articles.show', get_defined_vars());
    }
}
