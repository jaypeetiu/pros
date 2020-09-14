<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles       =       Article::latest()->paginate(5);
        return view("index", compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create-article');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                "title"         =>      "required",
                "description"   =>      "required"
            ]
        );

        $article            =           Article::create($request->all());

        if(!is_null($article)) {
            return back()->with("success", "Success! Article created");
        }

        else {
            return back()->with("failed", "Alert! Article not created");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('show-article', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('edit-article', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            "title"           =>      "required",
            "description"     =>      "required",
        ]);

        $article            =       $article->update($request->all());
        if(!is_null($article)) {
            return back()->with("success", "Success! Article updated");
        }

        else {
            return back()->with("failed", "Alert! Article not updated");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article        =       $article->delete();

        if(!is_null($article)) {
            return back()->with("success", "Success! Article deleted");
        }
        else {
            return back()->with("failed", "Alert! Article not deleted");
        }
    }
}
