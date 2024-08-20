<x-app-layout>
    <x-slot name="header">Post</x-slot>
    <div class="back"><a href="/"><</a></div>
    <div class="show_page">
        <div class="select">
            <p>プロフィール</p>
            <p>保存</p>
            <p>like</p>
        </div>
        <div class="detail">
            <div class="posts">
                <p>{{ $post->user->name }}</p>
                <p>{{ $post->body }}</p>
                <p>カテゴリー:{{ $post->category->name }}</p>
                @if($post->image_url)
                <div>
                    <img src="{{ $post->image_url }}" alt="画像が読み込めません。">
                </div>
                @endif
            </div>
            <div claas="comments">
                <div class="comment">
                    <h1>コメント</h1>
                    @foreach($comments as $comment)
                        <p>{{ $comment->user->name }}</p>
                        <p>{{ $comment->body }}</p>
                        @if($post->image_url)
                        <div>
                            <img src="{{ $post->image_url }}" alt="画像が読み込めません。">
                        </div>
                        @endif
                    @endforeach 
                </div>
                <form action="/posts/{{ $post->id }}/comment" method="POST" name="comment_form">
                    @csrf
                    <textarea name="comment" placeholder='コメントしよう！'></textarea>
                    {{-- <p class="body_error" style="color:red">{{ $errors->first('post.body') }}</p> --}}
                    <input type="submit" value="送信"/>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
