<x-app-layout>
    <x-slot name="header">アプリ名</x-slot>
    <div class="all">
        <div class="select">
            <p><a href="/user">プロフィール</a></p>
            <p>保存</p>
            <p>like</p>
        </div>
        <div class="posts">
            <div class="create">
            <a href="/posts/post">post</a>
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
            　　@endif
            @endforeach
        </div>
    </div>
</x-app-layout>


