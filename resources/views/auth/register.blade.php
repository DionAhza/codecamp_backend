<div class="container">
    @if ($errors->any())
        @foreach ($errors->all() as $item)
            <p>{{ $item }}</p>
        @endforeach
        
    @endif
    @if (session('message'))
        <p>{{ session('message') }}</p>
    @endif
    <div class="form-box">

        <!-- Login Form -->
       

        <!-- Register Form -->
        <form class="form register" action="{{ route('register') }}" method="POST">
            @csrf
            <h2>Register</h2>
            <input type="text" name="name" placeholder="Nama Lengkap" >
            <input type="email" name="email" placeholder="Email" >
            <input type="password" name="password" placeholder="Password" >
            <button type="submit">Daftar</button>
            <p>Sudah punya akun? <a href="/login">Login</a></p>
        </form>

    </div>
</div>

<style>
     * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    height: 100vh;
    background: linear-gradient(135deg, #4facfe, #00f2fe);
    display: flex;
    justify-content: center;
    align-items: center;
}

.container {
    width: 350px;
}

.form-box {
    background: white;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.2);
}

.form {
    display: flex;
    flex-direction: column;
}

.form h2 {
    text-align: center;
    margin-bottom: 20px;
}

.form input {
    margin-bottom: 15px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.form button {
    padding: 10px;
    border: none;
    background: #4facfe;
    color: white;
    font-weight: bold;
    border-radius: 5px;
    cursor: pointer;
}

.form button:hover {
    background: #007bff;
}

.form p {
    text-align: center;
    margin-top: 10px;
}

.form a {
    color: #007bff;
    text-decoration: none;
}
</style>