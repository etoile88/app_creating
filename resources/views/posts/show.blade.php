<x-app-layout>
    <x-slot name="header">Post</x-slot>
    <div class="back">[<a href="/"><</a>]</div>
    <div class="detail">
        <h1>曲の詳細</h1>
        <p>投稿者名:{{ $post->user->name }}</p>
        <p>本文:{{ $post->body }}</p>
        <p>カテゴリー:{{ $post->category->name }}</p>
        @if($post->image_url)
        <div>
            <img src="{{ $post->image_url }}" alt="画像が読み込めません。">
        </div>
        @endif
        <h1>コメント</h1>
    </div>
    <div claas="comments">
        @foreach($comments as $comment)
            <p>コメント者名:{{ $comment->user->name }}</p>
            <p>コメント:{{ $comment->body }}</p>
            @if($post->image_url)
            <div>
                <img src="{{ $post->image_url }}" alt="画像が読み込めません。">
            </div>
            @endif
        @endforeach    
    </div>
    <form action="/posts/{{ $post->id }}/comment" method="POST" name="comment_form">
        @csrf
        <div class="comment">
            <textarea name="comment" placeholder='コメントしよう！'></textarea>
        {{-- <p class="body_error" style="color:red">{{ $errors->first('post.body') }}</p> --}}
        </div>
        <input type="submit" value="送信"/>
    </form>
</x-app-layout>
