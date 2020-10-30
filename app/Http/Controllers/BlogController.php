<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Helpers\Helpers;
use Illuminate\Routing\Route;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class BlogController extends Controller
{
    public function __construct(Route $route)
    {
        if(Helpers::getShortAction($route) != 'show'){
            $this->middleware('auth');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Article::class);
        return view('blog.create', [
            'pageTitle' => "Ajout d'un article"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Article::class);
        $article = new Article();
        $article->title = $request->title;
        $article->article = $request->article;
        $article->user_id = Auth::user()->id;
        $article->save();
        return redirect()->route('blog.show', ['id' => $article->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('blog.show', [
            'pageTitle' => $article->title,
            'article' => $article
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        if(Auth::user()->can('edit',$article)) {
            return view('blog.edit', [
                'pageTitle' => 'Modifier un article',
                'article' => $article
            ]);
        } else {
            abort(403);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        if(Auth::user()->can('edit',$article)) {
            $article->title = $request->title;
            $article->article = $request->article;
            if($article->save()) {
                return redirect()->route('blog.show', $id)->with('success', "L'article a été modifié avec succès !");
            }
        } else {
            abort(403);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        if(Auth::user()->can('destroy', $article)) {
            if($article->delete())
                return redirect()->back()->with('success',"L'article a été supprimé avec succès !");
        }
    }
}
