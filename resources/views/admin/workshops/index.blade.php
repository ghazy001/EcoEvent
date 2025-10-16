{{-- resources/views/admin/workshops/index.blade.php --}}
@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>Workshops</h1>
            <a href="{{ route('admin.workshops.create') }}" class="btn btn-primary btn-sm">Nouveau</a>
        </div>

        @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif

        <table class="table table-sm">
            <thead><tr>
                <th>#</th><th>Titre</th><th>Date</th><th>Lieu</th><th>Statut</th><th></th>
            </tr></thead>
            <tbody>
            @foreach($workshops as $w)
                <tr>
                    <td>{{ $w->id }}</td>
                    <td>{{ $w->title }}</td>
                    <td>{{ optional($w->start_at)->format('d/m/Y H:i') }}</td>
                    <td>{{ $w->lieu?->name }}</td>
                    <td><span class="badge bg-secondary">{{ $w->status }}</span></td>
                    <td class="text-end">
                        <a href="{{ route('admin.workshops.edit',$w) }}" class="btn btn-sm btn-outline-secondary">Éditer</a>
                        <form action="{{ route('admin.workshops.destroy',$w) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Supprimer ce workshop ?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $workshops->links() }}
    </div>
@endsection
