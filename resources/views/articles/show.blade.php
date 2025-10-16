@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <h1>{{ $article->title }}</h1>
        <p class="text-muted">
            <small>{{ $article->category?->name ?? '—' }} • {{ optional($article->published_at)->format('d/m/Y H:i') }}</small>
        </p>
        @if($article->image_path)
            <img src="{{ asset('storage/'.$article->image_path) }}" class="img-fluid rounded mb-3" alt="{{ $article->title }}">
        @endif
        @if($article->excerpt)
            <p class="lead">{{ $article->excerpt }}</p>
        @endif
        <div class="content">{!! nl2br(e($article->body)) !!}</div>
    </div>
@endsection
