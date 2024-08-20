<x-app-layout>
    <x-slot name="header">アプリ名</x-slot>
    <div class="back"><a href="/"><</a></div>
    <div class="all">
        <div class="select">
            <p><a href="/user">プロフィール</a></p>
            <p>保存</p>
            <p>like</p>
        </div>
            </div>
            @foreach($posts as $post)
                <div class="post">
                    <h1 class="user_id">{{ $post->user->name }}</h1>
                    <p class="body"><a href="/posts/{{ $post->id }}">{{ $post->body }}</a></p>
        　　      </div>
                @if($post->image_url)
                <div>
                    <img src="{{ $post->image_url }}" alt="画像が読み込めません。">
                </div>
                <form action="/user/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="deletePost({{ $post->id }})">delete</button> 
                </form>
            　　@endif
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

