<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>app_name</title>
        <link rel="stylesheet" herf="CSSのリンク">
    </head>
    <x-app-layout>
        <x-slot name="header">アプリ名</x-slot>
    <body>
        <div class="posts">
            @foreach($posts as $post)
                <div class="post">
                    <h1 class="user_id">{{ $post->user_id }}名前</h1>
                    <p1 class="body">{{ $post->body }}こんにちは</p1>
        　　    </div>
            @endforeach
        </div>
            <div class="comment">
                <a href="/posts/comment">comment</a>  {{-- コメントマークにしたい --}}　
            </div>
            
        </div>
    </body>
    </x-app-layout>
</html>

