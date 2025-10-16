@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <h1>{{ $project->title }}</h1>
        <p class="text-muted"><small>Status: {{ $project->status }} • {{ $project->progress }}%</small></p>
        @if($project->description)<p class="lead">{{ $project->description }}</p>@endif

        <h5 class="mt-4">Tasks</h5>
        <ul class="list-group">
            @forelse($tasks as $t)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <strong>{{ $t->title }}</strong>
                        @if($t->description)<div class="text-muted small">{{ Str::limit($t->description, 120) }}</div>@endif
                        @if($t->due_date)<div class="small">Due: {{ $t->due_date->format('d/m/Y') }}</div>@endif
                    </div>
                    <span class="badge bg-secondary">{{ $t->status }}</span>
                </li>
            @empty
                <li class="list-group-item text-muted">No tasks yet.</li>
            @endforelse
        </ul>
    </div>
@endsection
