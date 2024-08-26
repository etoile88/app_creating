<x-app-layout>
    <x-slot name="header">アプリ名</x-slot>
    <div class="all">
        <div class="select">
            <p><a href="/user">プロフィール</a></p>
            <p><a href="/likes">like</a></p>
            <p>保存</p>
            <p><a href="/search">Search</a></p>
        </div>
        <div class="posts">
            <div class="create">
                <a href="/posts/post">post</a>
            </div>
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
            @endforeach
        </div>
    </div>
</x-app-layout>


