@extends('layouts.admin')
@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>Articles</h1>
            <a href="{{ route('admin.articles.create') }}" class="btn btn-primary">Nouvel article</a>
        </div>

        @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif

        <div class="row">
            @forelse($articles as $a)
                <div class="col-md-4 mb-3">
                    <div class="card h-100 shadow-sm">
                        @if($a->image_path)
                            <img src="{{ asset('storage/'.$a->image_path) }}" class="card-img-top" alt="{{ $a->title }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title mb-1">{{ $a->title }}</h5>
                            <p class="text-muted mb-2"><small>{{ $a->category?->name ?? '—' }}</small></p>
                            <p class="mb-3">{{ Str::limit($a->excerpt ?? strip_tags($a->body), 100) }}</p>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.articles.edit',$a) }}" class="btn btn-sm btn-outline-secondary">Éditer</a>
                                <form method="POST" action="{{ route('admin.articles.destroy',$a) }}">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Supprimer ?')">Supprimer</button>
                                </form>
                            </div>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">
                                {{ $a->is_published ? 'Publié le '.optional($a->published_at)->format('d/m/Y H:i') : 'Brouillon' }}
                            </small>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12"><p class="text-center text-muted">Aucun article.</p></div>
            @endforelse
        </div>

        <div class="mt-3">{{ $articles->links() }}</div>
    </div>
@endsection
