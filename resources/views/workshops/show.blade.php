{{-- resources/views/workshops/show.blade.php --}}
@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <h1>{{ $workshop->title }}</h1>
        <p class="text-muted">{{ $workshop->lieu?->name }}</p>
        <p>{{ $workshop->description }}</p>

        <h5 class="mt-4">Matériels requis</h5>
        <ul>
            @forelse($workshop->materials as $m)
                <li>{{ $m->name }} — x{{ $m->pivot->quantity }} @if($m->unit) {{ $m->unit }} @endif</li>
            @empty
                <li>Aucun matériel.</li>
            @endforelse
        </ul>
    </div>
@endsection
