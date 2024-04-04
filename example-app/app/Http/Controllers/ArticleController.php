<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function create(){
        Article::create([
            'title'=> 'title1',
            'description'=>'desc',
            'category_id'=> 1,
            'image'=> 'img'
        ]);
        return 'create success';
    }
    public function list():View
    {
        $articles = Article::all();
        return view('articles', ['articles'=>$articles]);
    }
}
