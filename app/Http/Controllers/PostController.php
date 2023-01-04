<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('posts/index')->with(['posts' => $post->getPaginateByLimit()]);
    }
    
    public function show(Post $post)
    {
        return view('posts/show')->with(['post' => $post]);
    }
    
    public function create()
    {
        return view('posts/create');
    }
    
    public function store(Request $request, Post $post)
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
}