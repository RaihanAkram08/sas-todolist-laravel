@extends('layout.app')

@section('content')
    <style>
        .done-task {
            text-decoration: line-through;
            color: gray;
        }
    </style>
    <div class="wrapper">
        <h1>Tugas Anda</h1>
        <p class="{{ $task->is_completed ? 'done-task' : '' }}">
            Nama: {{ $task->task }}
        </p>
        <p>Status: {{ $task->status_text }}</p>

        <a href="/tasks">Kembali ke halaman semua tugas</a>
    </div>
    

@endsection