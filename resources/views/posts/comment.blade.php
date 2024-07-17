<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" herf="CSSのリンク">
    </head>
    <x-app-layout>
        <x-slot name="header">Comments</x-slot>
    <body>
        <h1>Comments</h1>
        <div class="comment">
            コメント{{ $comment }} {{-- ここでコメントする場所に行きたい --}}　
        </div>
        <div class="back">[<a href="/">back</a>]</div>
        
    </body>
    </x-app-layout>
</html>
