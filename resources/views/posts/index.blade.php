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
        <div class="posts">
            @foreach($posts as $post)
                <div class="post">
                    <h1 class="user_id">{{ $post->user_id }}名前</h1>
                    <p1 class="body">{{ $post->body }}こんにちは</p1>
        　　    </div>
            @endforeach
        </div>
        <div class="comment">
            <a href="/posts/comment">comment</a>  {{-- コメントマークにしたい --}}　
        </div>
        <div class="like">
            <a href="">like</a>
        </div>
        <div class="keep">
            <a href="">保存</a>
        </div>    
        </div>
 
</x-app-layout>


