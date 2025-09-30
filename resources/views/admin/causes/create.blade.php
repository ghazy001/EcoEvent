@extends('layouts.admin')

@section('title','Add New Cause')

@section('content')
    <div class="container">
        <h1>Add New Cause</h1>
        <form action="{{ route('admin.causes.store') }}" method="POST">
            @include('admin.causes._form', ['buttonText' => 'Create Cause'])
        </form>
    </div>
@endsection
