<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\MyPost;
use App\Models\Tag;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View as FacadesView;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts=MyPost::orderBy('title','desc')->take(1)->get();
        // $post=MyPost::all();
        // $posts=DB::select('SELECT * FROM my_posts');
        return FacadesView::make('welcome'); 
        if (request('tag')) {
            $articles = Tag::where('name', request('tag'))->firstOrFail()->articles;
            
        } else {
            // $articles = Article::orderBy('title', 'desc')->paginate(2);
            
            $articles = Article::latest()->get();
        }

        return view('pages.index2')->with('articles', $articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create',[
            'tags'=>Tag::all()
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
        // request()->validate([
        //     'title'=>request('title'),
        //     'body'=>request('body')  
        // ]);
        // $this->validate($request,[
        //     'title'=>'required',
        //     'body'=>'required'
        // ]);
        // $posts=new MyPost();
        // $posts->title=$request->title;
        // $posts->body=$request->body;
        // $posts->save();
        // MyPost::create([
        //     'title'=>$request->title,
        //     'body'=>$request->body
        // ]);
        $article=Article::create($this->validatorFun($request));
        $article->tags()->attach(request('tags'));
        // Article::create($this->validatorFun($request));

        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        // $post=MyPost::findOrFail($id);
        return view('posts.show')->with('article', $article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        // $post=MyPost::find($id);
        return view('posts.edit')->with('article', $article);
        // return view('posts.edit',compact('post'));
        // return view('posts.edit',['post'=>$post]);
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
        // $this->validate($request,[
        //     'title'=>'required',
        //     'body'=>'required'
        // ]);
        // $post=MyPost::find($id);
        // $post->title=$request->title;
        // $post->body=$request->body;
        // $post->save();
        // return redirect('posts');
        $article->update($this->validatorFun($request));
        return redirect($article->path());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete(); 
        return redirect('posts');     //
    }
    public function validatorFun(Request $request)
    {
        return $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);
    }
}
