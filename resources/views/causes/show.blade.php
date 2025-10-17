@extends('layouts.app')
@section('title', $cause->title)

@section('content')
    <div class="container py-5">
        @include('partials.flash')

        <div class="row">
            <div class="col-md-8">

                {{-- IMAGE --}}
                @if($cause->image_path)
                    <img
                        src="{{ asset('storage/'.$cause->image_path) }}"
                        alt="{{ $cause->title }}"
                        class="rounded mb-3 w-100"
                        style="max-height: 360px; object-fit: cover;"
                    >
                @endif

                <h1>{{ $cause->title }}</h1>
                <p>{{ $cause->description }}</p>

                <div class="mb-3">
                    <strong>Goal:</strong>
                    €{{ number_format($cause->goal_amount,2) }}
                    —
                    <strong>Raised:</strong>
                    €{{ number_format($cause->totalDonations(),2) }}
                    ({{ $cause->percentRaised() }}%)
                </div>

                <h4 class="mt-4">Donations</h4>
                <ul class="list-group mb-4">
                    @forelse($cause->donations as $donation)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <strong>{{ $donation->donor_name }}</strong>
                                <div class="small text-muted">
                                    {{ $donation->date->format('M d, Y') }}
                                </div>
                            </div>
                            <div>€{{ number_format($donation->amount,2) }}</div>
                        </li>
                    @empty
                        <li class="list-group-item">No donations yet.</li>
                    @endforelse
                </ul>
            </div>

            <div class="col-md-4">
                <div class="card p-3">
                    <h5>Make a donation</h5>
                    <form method="POST" action="{{ route('causes.donations.store', $cause) }}">
                        @csrf
                        @auth
                            {{-- Automatically use logged-in user name --}}
                            <input type="hidden" name="donor_name" value="{{ auth()->user()->name }}">
                        @else
                            {{-- Fallback for guests (optional) --}}
                            <div class="mb-2">
                                <input name="donor_name" class="form-control" placeholder="Your name"
                                       value="{{ old('donor_name') }}" required>
                                @error('donor_name')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                        @endauth

                        <div class="mb-2">
                            <input name="amount" type="number" step="0.01" class="form-control"
                                   placeholder="Amount (€)" value="{{ old('amount') }}" required>
                            @error('amount')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <button class="btn btn-success w-100">Donate</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <a href="{{ route('causes.index') }}" class="btn btn-secondary">Back to Causes</a>
        </div>
    </div>
@endsection
