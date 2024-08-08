<x-app-layout>
   <x-slot name="header">アプリ名</x-slot>
        <aside>
            <div class="select">
                <ul>
                    <li>プロフィール</li>
                    <li>保存</li>
                    <li>like</li>
                </ul>
            </div>
        </aside>
        <div class="create">
            <a href="/posts/post">post</a>
        </div>
        <div class="posts">
            @foreach($posts as $post)
                <div class="post">
                    <h1 class="user_id">ユーサー名{{ $post->user->name }}</h1>
                    <p class="body"><a href="/posts/{{ $post->id }}">本文{{ $post->body }}</a></p>
        　　    </div>
            @endforeach
        </div>
        </div>
 
</x-app-layout>


