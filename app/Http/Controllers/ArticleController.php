<?php

namespace App\Http\Controllers;
use App\Article;
use Illuminate\Http\Request;
use Nette\Schema\Schema;

class ArticleController extends Controller
{
    public function index(){
     //return Article::all();
  return response() ->json (['$data']);
    }
    public function store(Request $request)
    {
       //return Article::create($request->all());

    }

  public function new ($id){


  }
  public function show($id)
    {
        //return Article::find($id);

    }
    public function create(){

    }
    public function edit($id){
        //
    }

}
