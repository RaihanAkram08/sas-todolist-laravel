@extends('layout.app')

@section('content')

<style>
    /* Font & Layout */
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, #ece9e6, #ffffff);
        color: #3a3a3a;
        padding: 30px;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }

    form {
        background: linear-gradient(145deg, #f7f8fc, #e2e6ef);
        padding: 30px 40px;
        border-radius: 15px;
        box-shadow: 0 15px 30px rgba(100, 100, 150, 0.15);
        width: 420px;
        transition: box-shadow 0.3s ease;
    }
    form:hover {
        box-shadow: 0 20px 40px rgba(100, 100, 150, 0.25);
    }

    label {
        display: block;
        font-weight: 600;
        font-size: 1.05rem;
        margin-bottom: 8px;
        color: #545454;
        letter-spacing: 0.02em;
    }

    input[type="text"], select {
        width: 100%;
        padding: 12px 15px;
        border-radius: 8px;
        border: 1.8px solid #cbd5e1;
        background-color: #f9fafb;
        font-size: 1rem;
        color: #444444;
        box-sizing: border-box;
        transition: border-color 0.3s ease, background-color 0.3s ease;
        outline-offset: 2px;
    }
    input[type="text"]:focus, select:focus {
        border-color: #6c63ff;
        background-color: #ffffff;
        outline: none;
        box-shadow: 0 0 8px #6c63ff44;
    }

    /* Error messages */
    span[style] {
        font-size: 0.85rem;
        color: #d9534f;
        font-weight: 600;
        margin-top: 5px;
        display: block;
    }

    button {
        margin-top: 22px;
        width: 100%;
        padding: 14px 0;
        font-size: 1.1rem;
        font-weight: 700;
        background: linear-gradient(135deg, #6c63ff, #8e7eff);
        color: white;
        border: none;
        border-radius: 12px;
        cursor: pointer;
        box-shadow: 0 8px 15px rgba(108, 99, 255, 0.3);
        transition: background 0.3s ease, box-shadow 0.3s ease;
        user-select: none;
    }
    button:hover {
        background: linear-gradient(135deg, #8e7eff, #6c63ff);
        box-shadow: 0 12px 20px rgba(108, 99, 255, 0.5);
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

@endsection