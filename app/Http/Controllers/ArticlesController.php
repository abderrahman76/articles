<?php

namespace App\Http\Controllers;

use http\Client\Curl\User;
use Illuminate\Http\Request;
use app\Models\Article;

class ArticlesController extends Controller
{
    
    public function index()
    {
        $articles = \App\Models\Article::paginate(5);
//        dd($articles);
        return view('areticles.index')->with(['articles'=>$articles]);
        // echo "hello from home";
    }

   
    public function create(Request $request)
    {
        $this->validate($request,[
            'title'=>'required|min:3|max:100',
            'description'=>'required|min:10|max:1000',
            'categorie'=>'required|numeric',
            
        ]);
        \App\Models\Article::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'categorie_id'=>$request->categorie,
            'user_id'=>auth()->user()->id
            
        ]);

        return redirect()->route('sorte');
        }

   
    public function sorte(){
        $user_id = auth()->id();

        $articles = \App\Models\Article::where('user_id', $user_id)->paginate(5);
        //        dd($articles);
                return view('areticles.myarticles')->with(['articles'=>$articles]);
                // echo "hello from home";
    }

   
    public function show(string $id)
    {
        $article = \App\Models\Article::findorfail($id);
//        dd($article);
        return view('areticles.article')->with(['article'=>$article]);
    }

  
    public function edit(Request $request)
    {
        $article = \App\Models\Article::findorfail($request->id);
        $article->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'categorie_id'=>$request->categorie,
        ]);
        return redirect()->route('sorte');

    }

    

   
    public function destroy(Request $request)
    {
        $article = \App\Models\Article::findorfail($request->id);
        $article->delete();
        return redirect()->route('index');
    }
}
