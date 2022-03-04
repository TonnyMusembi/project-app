<?php

namespace App\Http\Controllers;
use App\Article;

use Illuminate\Http\Request;
use Nette\Schema\Schema;

class ArticleController extends Controller
{
    public function index(){
        //return Article::all();
        //return $request->user();

    }
    public function store(Request $request)
    {
       // return Article::create($request->all());

    }

  public function new (){
     

  }
}
