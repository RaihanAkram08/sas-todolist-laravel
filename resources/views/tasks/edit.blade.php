@extends('layout.app')

@section('content')

<style>
    /* Layout & Font */
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: #d0e2ff; /* biru soft cerah untuk body */
        color: #2e3a59; /* warna teks gelap navy */
        padding: 40px 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 80vh;
        flex-direction: column;
    }

    form {
        background: #aac8ff; /* biru soft medium untuk form */
        padding: 36px 48px;
        border-radius: 16px;
        box-shadow: 0 12px 28px rgba(50, 90, 200, 0.25);
        width: 460px;
        transition: box-shadow 0.3s ease;
    }
    form:hover {
        box-shadow: 0 18px 38px rgba(50, 90, 200, 0.35);
    }

    label {
        display: block;
        font-weight: 600;
        font-size: 1.1rem;
        margin-bottom: 10px;
        color: #1f2a47;
        letter-spacing: 0.03em;
    }

    input[type="text"],
    select {
        width: 100%;
        padding: 14px 16px;
        border-radius: 10px;
        border: 1.6px solid #719ce9;
        background-color: #d9e6ff;
        font-size: 1rem;
        color: #1a254f;
        box-sizing: border-box;
        transition: border-color 0.3s ease, background-color 0.3s ease;
        outline-offset: 3px;
        outline-color: transparent;
        outline-style: solid;
    }
    input[type="text"]:focus,
    select:focus {
        border-color: #3f66d1;
        background-color: #ffffff;
        box-shadow: 0 0 10px #3f66d1aa;
        outline-color: #3f66d1;
        outline-style: solid;
    }

    /* Error messages */
    span[style] {
        font-size: 0.9rem;
        color: #d64545;
        font-weight: 600;
        margin-top: 6px;
        display: block;
    }

    button {
        margin-top: 28px;
        width: 100%;
        padding: 16px 0;
        font-size: 1.15rem;
        font-weight: 700;
        background: linear-gradient(135deg, #3f66d1, #5479e5);
        color: white;
        border: none;
        border-radius: 14px;
        cursor: pointer;
        box-shadow: 0 10px 22px rgba(63, 102, 209, 0.4);
        transition: background 0.3s ease, box-shadow 0.3s ease;
        user-select: none;
    }
    button:hover {
        background: linear-gradient(135deg, #5479e5, #3f66d1);
        box-shadow: 0 14px 28px rgba(63, 102, 209, 0.6);
    }

    /* Link kembali di bawah form */
    a.back-link {
        display: block;
        width: 460px;
        margin: 24px 0 0 0;
        text-align: center;
        padding: 14px 0;
        background-color: #2a47a3; /* biru gelap untuk tombol back */
        color: white;
        font-weight: 600;
        font-size: 1rem;
        border-radius: 14px;
        text-decoration: none;
        box-shadow: 0 6px 14px rgba(42, 71, 163, 0.6);
        transition: background-color 0.3s ease, box-shadow 0.3s ease;
        user-select: none;
    }
    a.back-link:hover {
        background-color: #1f2a68;
        box-shadow: 0 8px 18px rgba(31, 42, 104, 0.8);
        text-decoration: none;
    }
</style>

<form action="/tasks/{{ $task->id }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="task">
            Edit Tugas Anda: <span style="color: red; font-weight: bold;">*</span>           
        </label>
        <input type="text" id="task" name="task" value="{{ $task->task }}">
        @error('task')
            <span style="color: red; font-weight: bold;">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="is_completed">Status</label>
        <select name="is_completed" id="is_completed">
            <option value="0" {{ (old('is_completed', $task->is_completed) == 0) ? 'selected' : '' }}>Belum selesai</option>
            <option value="1" {{ (old('is_completed', $task->is_completed) == 1) ? 'selected' : '' }}>Sudah selesai</option>
        </select>
    </div>
    <button type="submit">Simpan</button>
</form>

<a href="/tasks" class="back-link">← Kembali ke halaman semua tugas</a>

@endsection
