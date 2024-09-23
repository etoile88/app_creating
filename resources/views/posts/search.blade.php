<x-app-layout>
    <x-slot name="header">検索画面</x-slot>
    <div class="back"><a href="/"><</a></div> 
    <div class="container">
        <div class="centered">
            <!--検索フォーム-->
            <form method="GET" action="{{ route('searchsongs')}}">
                <!--商品名の入力-->
                <div class="form-group">
                    <label>検索</label>
                    <input type="text" name="searchWord" value="{{ $searchWord }}">
                </div>
                <!--カテゴリ選択-->
                <div class="form-group">
                    <label>カテゴリー</label>
                    <div class="categories">
                        <select name="categoryId">
                            <option value="">未選択</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>   
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit">検索</button>
                </div>
            </form>
        </div>
    </div>
    
    @if (!empty($posts))
    <div>
        <p>全{{ $posts->count() }}件</p>
        <thead>
            <tr>
                <th>曲名</th>
                <th>カテゴリ</th>
            </tr>
        </thead>
        <div class="posts">
            @foreach($posts as $post)
                <div class="post">
                    <h1 class="user_id">{{ $post->user->name }}</h1>
                    <p class="artist">{{$post->artist }}</p>
                    <p class="song">{{ $post->song }}</p>
                    <p class="body"><a href="/posts/{{ $post->id }}">{{ $post->body }}</a></p>
                    <p>カテゴリー:{{ $post->category->name }}</p>
        　　      </div>
                <div class="img">
                    @if($post->image_url)
                    <div>
                        <img src="{{ $post->image_url }}" alt="画像が読み込めません。">
                    </div>
                　　@endif
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
    <!--テーブルここまで-->
    <!--ページネーション-->
    <div>
        {{-- appendsでカテゴリを選択したまま遷移 --}}
        {{ $posts->appends(request()->input())->links() }}
    </div>
    <!--ページネーションここまで-->
    @endif
</x-app-layout>


