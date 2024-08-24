<x-app-layout>
    <x-slot name="header">profile</x-slot>
    <div class="back"><a href="/"><</a></div>
    <div class="profile">
        <div class="select">
            <p><a href="/user">プロフィール</a></p>
            <p>保存</p>
            <p><a href="/likes">like</a></p>
        </div>
        <div class="posts">
            @foreach($posts as $post)
                <div class="post">
                    <h1 class="user_id">{{ $post->user->name }}</h1>
                    <p class="body"><a href="/posts/{{ $post->id }}">{{ $post->body }}</a></p>
        　　      </div>
                @if($post->image_url)
                <div>
                    <img src="{{ $post->image_url }}" alt="画像が読み込めません。">
                </div>
                @endif
                <form action="/user/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="deletePost({{ $post->id }})">delete</button>
                </form>
                {{--いいね機能--}}
                {{--<div>
                <form action="{{ route('post.like', ['id' => $post->id]) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn btn-primary btn-sm">いいね</button>
                </form>--}}
                <div class="likes">
                    <form method="POST" action="{{ route($post->is_liked_by_auth_user() ? 'unlike' : 'like', ['id' => $post->id]) }}">
                        @csrf
                        <button type="submit" class="like-button">
                            いいね<span class="badge">{{ $post->likes->count() }}</span>
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
        <script>
            function deletePost(id) {
                'use strict'
                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
    </div>
</x-app-layout>

