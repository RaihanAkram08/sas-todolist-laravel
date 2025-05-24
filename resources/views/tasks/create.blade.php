@extends('layout.app')

@section('content')

<form action="{{ url('tasks') }}" method="POST">
    @csrf
    <div>
        <label for="task">
            Tugas: <span style="color: red; font-weight: bold;">*</span>           
        </label>
        <input type="text" id="task" name="task" value="{{ old('task') }}">
        @error('task')
            <span style="color: red; font-weight: bold;">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="is_completed">Status</label>
        <select name="is_completed" id="is_completed">
            <option value="0" {{ old('is_completed') == '0' ? 'selected' : '' }}>Belum selesai</option>
            <option value="1" {{ old('is_completed') == '1' ? 'selected' : '' }}>Sudah selesai</option>
        </select>
    </div>

    <button type="submit">Simpan</button>
</form>
<a href="/tasks">Kembali ke halaman semua tugas</a>

@endsection
