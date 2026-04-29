<div style="max-width: 800px; margin:auto; font-family: sans-serif;">

    @auth
        <h2>Halo, {{ Auth::user()->name }}</h2>
        <a href="/logout" style="color:white; background:red; padding:8px 15px;">Logout</a>
    @endauth

    @guest
        <h2>Selamat datang di Blog</h2>
        <a href="/login">Login</a>
    @endguest

    <hr>

    {{-- FORM TAMBAH POST --}}
    @auth
    <div style="margin-bottom: 30px;">
        <h3>Buat Postingan</h3>
        <form action="{{ route('post.store') }}" method="POST">
            @csrf
            <input type="text" name="title" placeholder="Judul" style="width:100%; margin-bottom:10px;">
            <textarea name="content" placeholder="Isi konten..." style="width:100%;"></textarea>
            <button type="submit">Post</button>
        </form>
    </div>
    @endauth

    {{-- LOOP POST --}}
    @foreach ($posts as $item)
    <div style="border:1px solid #ddd; padding:15px; margin-bottom:20px; border-radius:10px;">
        
        <h3>{{ $item->title }}</h3>
        <p>{{ $item->content }}</p>
        <small>By: {{ $item->user->name }}</small>

        {{-- ACTION --}}
        @auth
        <div style="margin-top:10px;">
            <form action="{{ route('post.delete', $item->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button>Hapus</button>
            </form>

            <a href="{{ route('post.edit', $item->id) }}">Edit</a>
        </div>
        @endauth

        <hr>

        {{-- KOMENTAR --}}
        <h4>Komentar</h4>

        @foreach ($item->comments as $comment)
            <div style="margin-bottom:10px; padding:10px; background:#f5f5f5; border-radius:5px;">
                <strong>{{ $comment->user->name }}</strong>
                <p>{{ $comment->content }}</p>
            </div>
        @endforeach

        {{-- FORM KOMENTAR --}}
        @auth
        <form action="{{ route('comment.store', $item->id) }}" method="POST">
            @csrf
            <input type="text" name="content" placeholder="Tulis komentar..." style="width:80%;">
            <button type="submit">Kirim</button>
        </form>
        @endauth
        @guest
            <p>Login untuk komentar</p>
        @endguest

    </div>
    @endforeach

</div>