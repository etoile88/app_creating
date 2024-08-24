<x-app-layout>
    <div class="back"><a href="/"><</a></div> 
    <x-slot name="header">Post</x-slot>
    <div class="all">
         <div class="select">
            <p><a href="/user">プロフィール</a></p>
            <p>保存</p>
            <p><a href="/likes">like</a></p>
        </div>
        <div class="creating">
            <h1>Post</h1>
            <form action="/" method="POST" enctype="multipart/form-data">{{-- enctypeは画像添付のためのファイルアップデートのコード--}}
                @csrf
                <div class="post">
                    {{-- バリデーション用のold()関数後にバリデーション要素を付け加える --}}
                    <textarea name="post[body]" placeholder='好きな音楽を共有しよう！' value="{{ old('post.body') }}"></textarea><br>
                    <div class="categories">
                        <select name="post[category_id]">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="image">
                        <input type="file" name="image">
                    </div> 
                    <p class="body_error" style="color:red">{{ $errors->first('post.body') }}</p>
                </div>
                <div class="posting">
                    <input type="submit" value="[投稿]"/>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
