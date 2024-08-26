<x-app-layout>
    <x-slot name="header">Post</x-slot>
    <div class="back"><a href="/"><</a></div>
    <div class="show_page">
        <div class="select">
            <p><a href="/user">プロフィール</a></p>
            <p>保存</p>
            <p><a href="/likes">like</a></p>
            <p><a href="/search">Search</a></p>
        </div>
        <div class="detail">
            <div class="posts">
                <p>{{ $post->user->name }}</p>
                <p class="artist">{{$post->artist }}</p>
                <p>{{ $post->song }}</p>
                <p>{{ $post->body }}</p>
                <p>カテゴリー:{{ $post->category->name }}</p>
                @if($post->image_url)
                <div>
                    <img src="{{ $post->image_url }}" alt="画像が読み込めません。">
                </div>
                @endif
                {{--Youtubeへの遷移機能--}}
                <div class="url">
                    <a href="https://www.youtube.com/results?search_query={{ $post->song }}">URL</a>
                </div>
                {{--いいね機能--}}
                <form method="POST" action="{{ route($post->is_liked_by_auth_user() ? 'unlike' : 'like', ['id' => $post->id]) }}">
                    @csrf
                    <button type="submit" class="like-button">
                        いいね<span class="badge">{{ $post->likes->count() }}</span>
                    </button>
                </form>
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
                        {{--いいね機能--}}      
                        <form method="POST" action="{{ route($post->is_liked_by_auth_user() ? 'unlike' : 'like', ['id' => $post->id]) }}">
                            @csrf
                            <button type="submit" class="like-button">
                                いいね<span class="badge">{{ $post->likes->count() }}</span>
                            </button>
                        </form>
                    @endforeach
                </div>
                <div class="comment_form">
                    <form action="/posts/{{ $post->id }}/comment" method="POST" name="comment_form">
                        @csrf
                        <textarea name="comment" placeholder='コメントしよう！'></textarea>
                        {{-- <p class="body_error" style="color:red">{{ $errors->first('post.body') }}</p> --}}
                        <input type="submit" value="送信"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
