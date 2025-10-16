@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>{{ $event->title }}</h1>

        <p><strong>Date début:</strong> {{ \Carbon\Carbon::parse($event->start_at)->format('d/m/Y H:i') }}</p>

        @if($event->end_at)
            <p><strong>Date fin:</strong> {{ \Carbon\Carbon::parse($event->end_at)->format('d/m/Y H:i') }}</p>
        @endif

        @if($event->lieu)
            <p><strong>Lieu:</strong> {{ $event->lieu->name }}</p>
            <p><strong>Adresse:</strong> {{ $event->lieu->address }}</p>
        @endif

        @if($event->description)
            <p>{{ $event->description }}</p>
        @endif

        @if($event->capacity)
            <p><strong>Capacité:</strong> {{ $event->capacity }}</p>
        @endif>

        <a href="{{ route('events.index') }}" class="btn btn-secondary mt-3">Retour aux événements</a>
    </div>
@endsection
