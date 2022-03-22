<?php

namespace App\Http\Controllers;
//use App\Article;
use Illuminate\Http\Request;
use Nette\Schema\Schema;
use App\Models\Article;


class ArticleController extends Controller
{
    public function index(){
    return Article::all();

 // return response() ->json (['$data']);
    }
    public function store(Request $request)
    {
        $article = Article::create($request->all());

        return response()->json($article, 201);

    }

  public function new ($id){


  }
  public function show( Article $article )
    {
        return $article;


    }
    public function create(){

    }
    public function edit($id){
        //
    }
public function update( Article $article , Request $request){

    $article->update($request->all());

        return response()->json($article, 200);
}
public function delete (Article $article){
    $article -> delete();
    return response()->json (null ,204);

}
}
