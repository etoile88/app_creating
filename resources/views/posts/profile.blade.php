<x-app-layout>
    <x-slot name="header">profile</x-slot>
    <div class="back"><a href="/"><</a></div>
    <div class="profile">
        <div class="select">
            <p><a href="/user">プロフィール</a></p>
            <p>保存</p>
            <p><a href="/likes">like</a></p>
            <p><a href="/search">Search</a></p>
        </div>
        {{--投稿--}}
        <div class="posts">
            @foreach($posts as $post)
                <div class="post">
                    <h1 class="user_id">{{ $post->user->name }}</h1>
                    <p class="artist">{{$post->artist }}</p>
                    <p class="song">{{ $post->song }}</p>
                    <p class="body"><a href="/posts/{{ $post->id }}">{{ $post->body }}</a></p>
                    <p>カテゴリー:{{ $post->category->name }}</p>
            　  </div>
                @if($post->image_url)
                <div>
                    <img src="{{ $post->image_url }}" alt="画像が読み込めません。">
                </div>
                @endif
                </form>
                {{--Youtubeへの遷移機能--}}
                <div class="url">
                    <a href="https://www.youtube.com/results?search_query={{ $post->song }}">URL</a>
                </div>
                {{--いいね機能--}}
                <form method="POST" action="{{ route($post->is_liked_by_auth_user() ? 'unlike' : 'like', ['id' => $post->id]) }}">
                    @csrf
                    <button type="submit" class="like-button">
                        いいね<span class="badge">{{ $post->likes->count() }}</span>
                    </button><br>
                </form>
                {{--削除機能--}}
                <form action="/user/{{ $post->id }}" id="form_{{ $post->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="deletePost({{ $post->id }})">delete</button>
                </form>
            @endforeach
        </div>
    </div>
    <script>
        function deletePost(id) {
            'use strict'
            if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                document.getElementById(`form_${id}`).submit();
            }
        }
    </script>
</x-app-layout>

