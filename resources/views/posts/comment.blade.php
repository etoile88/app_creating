<x-app-layout>
    <x-slot name="header">Comments</x-slot>
        <h1>userにコメント</h1>
        <form action="/posts/{{ $post->id }}/comment" method="POST" name="comment_form">
            @csrf
            <div class="commnet">
                <textarea name="comment[body]" placeholder='好きな音楽を共有しよう！'></textarea><br>
                <p class="body_error" style="color:red">{{ $errors->first('comment.body') }}</p>
            </div>
            <input type="submit" value="送信"/>
            <div class="comment_re">comment
            </div>
            <div class="like">
                <a href="">like</a>
            </div>
            <div class="keep">
                <a href="">保存</a>
            </div>    
            <div class="back">[<a href="/">back</a>]</div>
        </form>
   
</x-app-layout>

