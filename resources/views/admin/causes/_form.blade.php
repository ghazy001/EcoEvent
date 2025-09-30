@csrf
<div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control" id="title" name="title"
           value="{{ old('title', $cause->title ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description', $cause->description ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label for="goal_amount" class="form-label">Goal Amount (€)</label>
    <input type="number" class="form-control" id="goal_amount" name="goal_amount"
           value="{{ old('goal_amount', $cause->goal_amount ?? '') }}" min="0" required>
</div>

<div class="mb-3">
    <label for="status" class="form-label">Status</label>
    <select class="form-control" id="status" name="status" required>
        @php $status = old('status', $cause->status ?? '') @endphp
        <option value="active" {{ $status=='active' ? 'selected' : '' }}>Active</option>
        <option value="completed" {{ $status=='completed' ? 'selected' : '' }}>Completed</option>
        <option value="canceled" {{ $status=='canceled' ? 'selected' : '' }}>Canceled</option>
    </select>
</div>

<button type="submit" class="btn btn-success">{{ $buttonText }}</button>
<a href="{{ route('admin.causes.index') }}" class="btn btn-secondary">Cancel</a>
