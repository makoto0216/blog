<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

      
    </head>
    <body class ="antialiased">
        <x-app-layout>
         <x-slot name="header">
        　投稿編集画面
    </x-slot>
       <h1 class="title">編集画面</h1>
       <div class=content>
       <form action="/posts/{{ $post->id }}" method="POST">
           @csrf
           @method('PUT')
           <div class= "content_title">
               <h2>タイトル</h2>
               <input type="text" name=post[title] placeholder="タイトル" value={{ $post->title }}>
               <p class="content_title__error" style="color:red">{{ $errors->first('post.title') }}</p>
           </div>
           <div class= "content_body">
               <h2>本文</h2>
               <textarea name= "post[body]" placeholder="今日も1日お疲れさまでした。">{{ $post->body }}</textarea>
               <p class="content_body__error" style="color:red">{{ $errors->first('post.body') }}</p>
           </div>
           <input type="submit" value="更新">
        </from>
        <div class = 'footer'>
           <a href="/posts/{{ $post->id }}">戻る</a>
    　 </div>
    　 </div>
    　 </x-app-layout>
    </body>
</html>