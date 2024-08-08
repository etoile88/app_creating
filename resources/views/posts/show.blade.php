<x-app-layout>
    <x-slot name="header">Post</x-slot>
        <h1>曲の詳細</h1>
        <p>本文:{{ $post->body }} </p>
        <p>投稿者名：{{ $post->user->name }}</p>
        <p>カテゴリー:{{ $post->category->name }}</p>
        <h1>コメント</h1>
        <div claas="comments">
            @foreach($comments as $comment)
                <p>コメント者名：{{ $comment->user->name }}</p>
                <p>コメント分：{{ $comment->body }}</p>
            @endforeach    
        </div>
        <form action="/posts/{{ $post->id }}/comment" method="POST" name="comment_form">
            @csrf
            <div class="comment">
                <textarea name="comment" placeholder='コメントしよう！'></textarea>
            {{--    <p class="body_error" style="color:red">{{ $errors->first('post.body') }}</p> --}}
            </div>
            <input type="submit" value="送信"/>
        </form>
</x-app-layout>
