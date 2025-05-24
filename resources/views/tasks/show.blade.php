@extends('layout.app')

@section('content')
<style>
    body {
        background: linear-gradient(to right, #a1cbe6, #b5d5f5);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: #1e3d59;
        padding: 40px;
    }

    .wrapper {
        background-color: #eaf4fb;
        border-radius: 14px;
        padding: 30px;
        box-shadow: 0 8px 20px rgba(30, 61, 89, 0.15);
        max-width: 650px;
        margin: 0 auto;
    }

    h1 {
        font-size: 2.1rem;
        font-weight: 700;
        color: #245c8d;
        margin-bottom: 25px;
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
    }

    p {
        font-size: 1.1rem;
        margin-bottom: 16px;
    }

    .done-task {
        text-decoration: line-through;
        color: #7a9eab;
        font-style: italic;
    }

    a {
        text-decoration: none;
        display: inline-block;
        margin-right: 12px;
        margin-top: 18px;
        padding: 10px 18px;
        font-weight: 600;
        border-radius: 8px;
        transition: all 0.3s ease-in-out;
    }

    a[href="/tasks"] {
        background-color: #4ea8de;
        color: #fff;
    }

    a[href="/tasks"]:hover {
        background-color: #3a86c7;
        box-shadow: 0 4px 10px rgba(58, 134, 199, 0.3);
    }

    .wrap-action a {
        background-color: #3c91e6;
        color: white;
    }

    .wrap-action a:hover {
        background-color: #2a73b5;
        box-shadow: 0 4px 10px rgba(42, 115, 181, 0.3);
    }
</style>

<div class="wrapper">
    <h1>Detail Tugas</h1>
    <p class="{{ $task->is_completed ? 'done-task' : '' }}">
        <strong>Nama:</strong> {{ $task->task }}
    </p>
    <p><strong>Status:</strong> {{ $task->status_text }}</p>

    <a href="/tasks">← Kembali ke semua tugas</a>
    <div class="wrap-action">
        <a href="/tasks/{{ $task->id }}/edit">Edit</a>
        <a href="/tasks/{{ $task->id }}/delete">Delete</a>
    </div>
</div>
@endsection
