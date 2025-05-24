@extends('layout.app')

@section('content')
<style>
    body {
        background-color: #1e3a5f; /* biru tua elegan */
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        padding: 40px 20px;
    }

    .form-container {
        background-color: #f0f6ff; /* biru soft pastel */
        max-width: 640px;
        margin: 0 auto;
        padding: 35px 45px;
        border-radius: 14px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
        border: 1px solid #bdd9f2;
        position: relative;
        overflow: hidden;
    }

    .form-container::before {
        content: "";
        position: absolute;
        top: -20px;
        right: -20px;
        width: 120px;
        height: 120px;
        background: rgba(74, 144, 226, 0.05);
        border-radius: 50%;
        z-index: 0;
    }

    .form-container h2 {
        text-align: center;
        color: #2a4d69;
        margin-bottom: 30px;
        position: relative;
        z-index: 1;
    }

    label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #2a4d69;
        position: relative;
        z-index: 1;
    }

    input[type="text"],
    select {
        width: 100%;
        padding: 12px 15px;
        margin-bottom: 20px;
        border: 1px solid #a5c4dd;
        border-radius: 8px;
        font-size: 1rem;
        background-color: #ffffff;
        transition: border-color 0.2s, box-shadow 0.2s;
        position: relative;
        z-index: 1;
    }

    input[type="text"]:focus,
    select:focus {
        border-color: #4a90e2;
        box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.2);
        outline: none;
        background-color: #ffffff;
    }

    .error-message {
        color: #d93025;
        font-size: 0.9rem;
        margin-top: -16px;
        margin-bottom: 16px;
        font-weight: bold;
        position: relative;
        z-index: 1;
    }

    button {
        background: linear-gradient(to right, #4a90e2, #357ab7);
        color: white;
        border: none;
        padding: 14px;
        border-radius: 8px;
        font-weight: bold;
        cursor: pointer;
        transition: background 0.3s;
        width: 100%;
        font-size: 1rem;
        position: relative;
        z-index: 1;
    }

    button:hover {
        background: linear-gradient(to right, #3c7ed9, #2e6bac);
    }

    .back-link {
        display: block;
        text-align: center;
        margin-top: 24px;
        color: #1e3a5f;
        text-decoration: none;
        font-weight: 500;
        position: relative;
        z-index: 1;
    }

    .back-link:hover {
        text-decoration: underline;
    }
</style>

<div class="form-container">
    <h2>Tambah Tugas Baru</h2>
    <form action="{{ url('tasks') }}" method="POST">
        @csrf
        <div>
            <label for="task">
                Tugas: <span style="color: red;">*</span>
            </label>
            <input type="text" id="task" name="task" value="{{ old('task') }}">
            @error('task')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="is_completed">Status</label>
            <select name="is_completed" id="is_completed">
                <option value="0" {{ old('is_completed') == '0' ? 'selected' : '' }}>Belum selesai</option>
                <option value="1" {{ old('is_completed') == '1' ? 'selected' : '' }}>Sudah selesai</option>
            </select>
        </div>

        <button type="submit">Simpan Tugas</button>
    </form>
    <a href="/tasks" class="back-link">← Kembali ke daftar tugas</a>
</div>
@endsection
