<x-app-layout>
    <x-slot name="header">Post</x-slot>
        <h1>Post</h1>
        <form action="/posts" method="POST" name="post_form">
            @csrf
            <div class="post">
                <textarea name="post[body]" placeholder='好きな音楽を共有しよう！'></textarea><br>
                <p class="body_error" style="color:red">{{ $errors->first('post.body') }}</p>
            </div>
            <input type="submit" value="送信"/>
            <div class="back"><a href="/">[back]</a></div>
        </form>
   
</x-app-layout>
