<x-app-layout>
    <x-slot name="header">MFinder</x-slot>
    <div class="all">
        <div class="select">
            <p><a href="/user">プロフィール</a></p>
            <p>like</p>
            <p>保存</p>
            <p><a href="/search">Search</a></p>
        </div>
        <div class="posts">
            <div class="create">
                <a href="/posts/post">post</a>
            </div>
            <div class="posts">
            @foreach($posts as $post)
                <div class="post">
                    <h1 class="user_id">{{ $post->user->name }}</h1>
                    <!-- フォロー/フォロー解除ボタン -->
                    @if (isset($isFollowed))
                        <div id="follow-container">
                            <button id="follow-btn-{{ $post->user->id }}" onclick="toggleFollow({{ $post->user->id }})">
                                {{ $isFollowed ? 'フォロー解除' : 'フォロー' }}
                            </button>
                            <span id="follow-count-{{ $post->user->id }}">{{ $followCount }} フォロワー</span>
                        </div>
                    @endif
                    
                    <script>
                        function toggleFollow(userId) {
                            const followBtn = document.getElementById('follow-btn-' + userId);
                            const followCount = document.getElementById('follow-count-' + userId);
        
                            const isFollowing = followBtn.innerText === 'フォロー解除';
        
                            // フォローまたはフォロー解除のAPIエンドポイント
                            const url = isFollowing ? `/unfollow/${userId}` : `/follow/${userId}`;
        
                            fetch(url, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}', // CSRFトークンを含める
                                },
                                body: JSON.stringify({}),
                            })
                            .then(response => response.json())
                            .then(data => {
                                // フォロー状況に応じてボタンのテキストとフォロワー数を更新
                                followBtn.innerText = isFollowing ? 'フォロー' : 'フォロー解除';
                                followCount.innerText = `${data.followCount} フォロワー`;
                            })
                            .catch(error => {
                                console.error('Error:', error);
                            });
                        }
                    </script>
                    <p class="artist">{{$post->artist }}の{{ $post->song }}の曲がおすすめ！</p>
                    <p class="body"><a href="/posts/{{ $post->id }}">{{ $post->body }}</a></p>
                    <p>カテゴリー:{{ $post->category->name }}</p>
        　　      </div>
                <div class="cat">
                    @if($post->image_url)
                        <a href="/"><img src="{{ $post->image_url }}" alt="画像が読み込めません。"></a>
            　　      @endif
            　　</div>
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


