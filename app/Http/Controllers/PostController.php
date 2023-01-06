<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Post;

class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('posts/index')->with(['posts' => $post->getPaginateByLimit(5)]);
        /*取得したDBのデータ[$post->get()]を”posts”という変数名でViewに渡している*/
    }
    
    public function show(Post $post)
    {
        return view('posts/show')->with(['post' => $post]);
    }
    
    public function create()
    {
        return view('posts/create');
    }
    
    public function store(PostRequest $request, Post $post)
    {
       $input = $request['post'];   
        /*post~と書かれているデータだけを取得して、
        $inputに格納*/
       $post->fill($input)->save(); 
        /*$inputに格納されたtitleやbodyで$postのデータを
        上書きして保存*/
       return redirect('/posts/' . $post->id);
        /*post->id（作成した投稿のid）をredirectの引数に入れることで、
        作成した投稿の詳細ページへ遷移させる*/
        /*⇒リクエスト情報として受け取ったタイトル・本文にて、
        postsテーブルに新規データとして登録実行*/
    }
    
    public function edit(Post $post)
    /*$post=URLで渡ってきた値をidに持つ投稿データ*/
    {
        return view('posts/edit')->with(['post' => $post]);
        /*editのviewに$postという変数を渡して、edit.blade.phpを返却している*/
    }
    
    public function update(PostRequest $request, Post $post)
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();

        return redirect('/posts/' . $post->id);
    }
}