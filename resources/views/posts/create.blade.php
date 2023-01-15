<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

      
    </head>
    <body class="antialiased">
        <x-app-layout>
         <x-slot name="header">
        　投稿作成画面
    </x-slot>
       <h1>Blog Name</h1>
       <form action='/posts' method="POST">
           @csrf
           <!--セキュリティの担保のため、他のサイトからのリクエストを許容しないように定義するもの。
           formリクエストを送る際に必須となる-->
           <div class= "title">
               <h2>Title</h2>
               <input type="text" name=post[title] placeholder="タイトル" value={{old('post.title')}}>
               <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
           </div>
           <div class= "body">
               <h2>Body</h2>
               <textarea name= "post[body]"placeholder="今日も1日お疲れさまでした。">{{old('post.body')}}</textarea>
               <!--TEXTAREAタグは、INPUTタグと違い、長い文章や改行を許容できる-->
               <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
           </div>
           <div class="category">
               <h2>Category</h2>
               <div class="category">
                    <select name="post[category_id]">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
           </div>
           <div>
               <input type="submit" value="store">
           </div>
       <div class = 'footer'>
           <a href="/">戻る</a>
    　 </div>
    　 </x-app-layout>
    </body>
</html>