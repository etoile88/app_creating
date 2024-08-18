<x-app-layout>
    <x-slot name="header">Post</x-slot>
    <div class="back"><a href="/"><</a></div> 
    <h1>Post</h1>
    <div class="creating">
        <form action="/" method="POST" enctype="mulutipart/form-data">{{-- enctypeは画像添付のためのファイルアップデートのコード--}}
            @csrf
            <div class="post">
                {{-- バリデーション用のold()関数後にバリデーション要素を付け加える --}}
                <textarea name="post[body]" placeholder='好きな音楽を共有しよう！' value="{{ old('post.body') }}"></textarea><br>
                <select name="post[category_id]">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
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
</x-app-layout>
