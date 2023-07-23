<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Imports\ArticlesImport;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id=Auth::user()->id;
        $articles=Article::where('user_id',$id)->get();
        return view('main.articles.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('main.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
        $request['user_id'] = Auth::user()->id;
        Article::create($request->post());
        return to_route('article.index')->with('success', 'Article bien ajoutee');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('main.articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('main.articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleRequest $request, Article $article)
    {
        $article->fill($request->post())->save();
        return to_route('article.index')->with('success', 'Article bien modifiee');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return to_route('article.index')->with('success', 'Article supprimer');
    }

    public function import(Request $request){
        $request->validate(['excelfile'=>'required']);
        Excel::import(new ArticlesImport,$request->file('excelfile'));
        return to_route('article.index')->with('success','articles importees');
    }

    public function stock(){
        $id=Auth::user()->id;
        $artDis=Article::where('user_id',$id)->get();
        $artAlert=Article::where('user_id',$id)->
                         where('quantite','<',10)->get();
        $artEpuise=Article::where('user_id',$id)->
                         where('quantite','=',0)->get();
        
        // $article=Article::all();
        return view('main.articles.etat_stock',['artD'=>$artDis,'artA'=>$artAlert,'artE'=>$artEpuise]);
    }
}
