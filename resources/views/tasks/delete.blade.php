@extends('layout.app')

@section('content')

<style>
    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(to right, #3a1c71, #d76d77, #ffaf7b);
        color: white;
        text-align: center;
        padding: 20px;
    }

    h1 {
        font-size: 28px;
        margin-bottom: 10px;
    }

    p {
        font-size: 18px;
        margin-bottom: 20px;
    }

    form {
        background: rgba(255, 255, 255, 0.1);
        padding: 20px;
        border-radius: 10px;
        display: inline-block;
        box-shadow: 0 0 10px rgba(255, 255, 255, 0.3);
    }

    div {
        margin-top: 20px;
    }

    a, button {
        display: inline-block;
        padding: 10px 20px;
        margin: 5px;
        border-radius: 5px;
        text-decoration: none;
        font-weight: bold;
        cursor: pointer;
    }

    a {
        background: cyan;
        color: black;
        border: none;
    }

    a:hover {
        background: lime;
    }

    button {
        background: red;
        color: white;
        border: none;
    }

    button:hover {
        background: darkred;
    }
</style>


    <h1>Hapus Tugas Anda</h1>
    <p>Apakah Anda benar-benar ingin delete Tugas dengan nama: <strong>{{ $task->task }}</strong> ?</p>
    <form action="/tasks/{{ $task->id }}" method="POST">
        @csrf
        @method('DELETE')
        <div>
            <a href="/tasks/{{ $task->id }}">Batal</a>
            <button type="submit">Yakin</button>
        </div>
    </form>

@endsection