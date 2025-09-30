@extends('layouts.admin')

@section('title','Edit Cause')

@section('content')
    <div class="container">
        <h1>Edit Cause</h1>
        <form action="{{ route('admin.causes.update', $cause) }}" method="POST">
            @method('PUT')
            @include('admin.causes._form', ['buttonText' => 'Update Cause'])
        </form>
    </div>
@endsection
