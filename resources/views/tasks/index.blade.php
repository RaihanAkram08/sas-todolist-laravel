@extends('layout.app')

@section('content')
<style>
    .logout-container {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 1000;
    }
    .logout-form button {
        background-color: #e63946;
        border: none;
        color: white;
        padding: 8px 15px;
        border-radius: 6px;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.3s ease;
        background-image: linear-gradient(to right, #6EC1E4, #A0E7F8);
        box-shadow: 0 4px 12px rgba(110, 193, 228, 0.4);
    }

    .logout-form button:hover {
        background-image: linear-gradient(to right, #5BB5DB, #90DDF3);
        box-shadow: 0 6px 16px rgba(110, 193, 228, 0.6);
        color: #ffffff;
    }


    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: #1e1e2f;
        color: #f0f0f5;
        padding: 30px;
    }

    h1 {
        font-weight: 700;
        font-size: 2.2rem;
        margin-bottom: 20px;
        color: #a8dadc;
        text-shadow: 1px 1px 4px #000000a0;
    }

    .wrap-a {
        margin-bottom: 25px;
    }

    .wrap-a a {
        background: #457b9d;
        color: #f1faee;
        padding: 8px 18px;
        margin-right: 10px;
        text-decoration: none;
        font-weight: 600;
        border-radius: 8px;
        box-shadow: 0 4px 8px #1a1a2e99;
        transition: background-color 0.3s ease, color 0.3s ease;
        user-select: none;
    }

    .wrap-a a:hover {
        background: #a8dadc;
        color: #1e1e2f;
        box-shadow: 0 6px 12px #a8dadcaa;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background: #2a2a3d;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 10px 20px #00000088;
    }

    thead tr {
        background: linear-gradient(90deg, #457b9d, #1d3557);
    }

    thead th {
        color: #f1faee;
        padding: 14px 20px;
        font-weight: 700;
        text-align: left;
        letter-spacing: 0.05em;
    }

    tbody tr {
        border-bottom: 1px solid #394867;
        transition: background-color 0.3s ease;
    }

    tbody tr:hover {
        background-color: #394867cc;
    }

    tbody td {
        padding: 14px 20px;
        color: #e0e0e0;
        font-weight: 500;
    }

    .done-task {
        text-decoration: line-through;
        color: #7a7a7a;
        font-style: italic;
    }

    tbody td a {
        color: #a8dadc;
        text-decoration: none;
        margin-right: 10px;
        font-weight: 600;
        transition: color 0.3s ease;
    }

    tbody td a:hover {
        color: #f1faee;
        text-decoration: underline;
    }

    select.status-dropdown {
        padding: 6px 12px;
        border-radius: 6px;
        border: 1.5px solid #6c8ecf;
        background-color: #e6ebfa;
        color: #34495e;
        font-weight: 600;
        cursor: pointer;
        transition: border-color 0.3s ease;
    }
    select.status-dropdown:hover {
        border-color: #4a6ed1;
    }

    .button-gradient {
        background-image: linear-gradient(to right, #6EC1E4, #A0E7F8);
        color: white;
        padding: 8px 16px;
        font-weight: 600;
        border-radius: 8px;
        text-decoration: none;
        display: inline-block;
        box-shadow: 0 4px 10px rgba(110, 193, 228, 0.3);
        transition: all 0.3s ease-in-out;
    }

    .button-gradient:hover {
        background-image: linear-gradient(to right, #5BB5DB, #90DDF3);
        color: #ffffff;
        box-shadow: 0 6px 14px rgba(110, 193, 228, 0.5);
    }


    /* Responsive */
    @media (max-width: 600px) {
        table, thead, tbody, th, td, tr {
            display: block;
        }

        thead tr {
            display: none;
        }

        tbody tr {
            margin-bottom: 20px;
            background: #2a2a3d;
            border-radius: 10px;
            padding: 15px;
        }

        tbody td {
            padding-left: 50%;
            position: relative;
            text-align: left;
        }

        tbody td::before {
            position: absolute;
            left: 20px;
            top: 14px;
            white-space: nowrap;
            font-weight: 700;
            color: #a8dadc;
        }

        tbody td:nth-of-type(1)::before { content: "Tugas"; }
        tbody td:nth-of-type(2)::before { content: "Status"; }
        tbody td:nth-of-type(3)::before { content: "Aksi"; }
    }
</style>

<div class="logout-container">
    <form method="POST" action="{{ route('logout') }}" class="logout-form">
        @csrf
        <button type="submit">Logout</button>
    </form>
</div>

<h1>Selamat Datang {{ auth()->user()->name }} !</h1>

<div class="wrap-a">
    <a href="/tasks/create" class="button-gradient">Buat Tugas Baru</a>
    <a href="{{ route('tasks.index') }}">Semua Tugas</a> |
    <a href="{{ route('tasks.index', ['status' => 'notdone']) }}">Pending</a> |
    <a href="{{ route('tasks.index', ['status' => 'done']) }}">Done</a>
</div>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Tugas</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($tasks as $task)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td class="{{ $task->is_completed ? 'done-task' : '' }}">
                    {{ $task->task }}
                </td>
                <td>
                    <select class="status-dropdown" data-task-id="{{ $task->id }}">
                        <option value="0" {{ $task->is_completed ? '' : 'selected' }}>Pending</option>
                        <option value="1" {{ $task->is_completed ? 'selected' : '' }}>Done</option>
                    </select>
                </td>
                <td>
                    <a href="/tasks/{{ $task->id }}">Detail</a>
                    <a href="/tasks/{{ $task->id }}/edit">Edit</a>
                    <a href="/tasks/{{ $task->id }}/delete">Delete</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3">Tidak ada tugas untuk bagian ini.</td>
            </tr>
        @endforelse
    </tbody>
</table>

<!-- Load SweetAlert2 from CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // Cek apakah ada session success dari controller
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: '{{ session('success') }}',
            timer: 2000,
            showConfirmButton: false
        });
    @endif

    // Script untuk dropdown status (seperti yang sudah kamu punya)
    document.querySelectorAll('.status-dropdown').forEach(select => {
        select.addEventListener('change', function() {
            const taskId = this.getAttribute('data-task-id');
            const newStatus = this.value;

            fetch(`/tasks/${taskId}/status`, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ is_completed: newStatus })
            })
            .then(response => {
                if (!response.ok) throw new Error('Network response was not ok');
                return response.json();
            })
            .then(data => {
                Swal.fire({
                    icon: 'success',
                    title: 'Status berhasil diperbarui',
                    text: `Tugas "${data.task}" sekarang ${data.status_text}`,
                    timer: 1000,
                    showConfirmButton: false
                });

                const row = this.closest('tr');
                if (newStatus == '1') {
                    row.querySelector('td').classList.add('done-task');
                } else {
                    row.querySelector('td').classList.remove('done-task');
                }
            })
            .catch(error => {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal update status',
                    text: error.message
                });
            });
        });
    });
</script>
@endsection

