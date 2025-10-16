@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="mb-4">Événements</h1>

        <a href="{{ route('admin.events.create') }}" class="btn btn-primary mb-3">Nouvel événement</a>

        <!-- Success message -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Table -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                <tr>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Début</th>
                    <th>Fin</th>
                    <th>Lieu</th>
                    <th>Capacité</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($events as $event)
                    <tr>
                        <td>{{ $event->title }}</td>
                        <td>{{ Str::limit($event->description, 50) }}</td>
                        <td>{{ $event->start_at }}</td>
                        <td>{{ $event->end_at }}</td>
                        <td>{{ $event->lieu->name ?? '-' }}</td>
                        <td>{{ $event->capacity }}</td>
                        <td>
                            <a href="{{ route('admin.events.edit', $event) }}" class="btn btn-sm btn-secondary">Modifier</a>

                            <form action="{{ route('admin.events.destroy', $event) }}" method="POST" style="display:inline" onsubmit="return confirm('Supprimer cet événement ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Suppr</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Aucun événement trouvé.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-3">
            {{ $events->links() }}
        </div>
    </div>
@endsection
