{{-- resources/views/admin/causes/index.blade.php --}}
@extends('layouts.admin')
@section('title','Manage Causes')

@section('content')
    <div class="container">
        <h1>Causes</h1>
        <a href="{{ route('admin.causes.create') }}" class="btn btn-primary">New Cause</a>
        <table class="table mt-3 align-middle">
            <thead>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Title</th>
                <th>Status</th>
                <th>Goal</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($causes as $cause)
                <tr>
                    <td>{{ $cause->id }}</td>
                    <td style="width:80px">
                        @if($cause->image_path)
                            <img src="{{ asset('storage/'.$cause->image_path) }}" alt="" class="rounded" style="height:48px;width:48px;object-fit:cover">
                        @else
                            <span class="text-muted">—</span>
                        @endif
                    </td>
                    <td>{{ $cause->title }}</td>
                    <td>{{ $cause->status }}</td>
                    <td>€{{ number_format($cause->goal_amount,2) }}</td>
                    <td>
                        <a href="{{ route('admin.causes.edit', $cause) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.causes.destroy', $cause) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Delete?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $causes->links() }}
    </div>
@endsection
