@extends('layouts.admin')
@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>Projects</h1>
            <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">New Project</a>
        </div>

        @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif

        <div class="table-responsive card shadow-sm">
            <table class="table table-hover mb-0">
                <thead><tr>
                    <th>Title</th><th>Status</th><th>Progress</th><th>Open tasks</th><th class="text-end">Actions</th>
                </tr></thead>
                <tbody>
                @forelse($projects as $p)
                    <tr>
                        <td>{{ $p->title }}</td>
                        <td><span class="badge bg-secondary">{{ $p->status }}</span></td>
                        <td>{{ $p->progress }}%</td>
                        <td>{{ $p->open_tasks_count }}</td>
                        <td class="text-end">
                            <a class="btn btn-sm btn-outline-secondary" href="{{ route('admin.projects.edit',$p) }}">Edit</a>
                            <form class="d-inline" method="POST" action="{{ route('admin.projects.destroy',$p) }}">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center text-muted">No projects.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">{{ $projects->links() }}</div>
    </div>
@endsection

