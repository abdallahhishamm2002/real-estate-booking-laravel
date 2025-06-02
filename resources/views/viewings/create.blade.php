@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Schedule a Viewing</h1>

    <div class="property-info">
        <h2>{{ $property->title }}</h2>
        <p class="address">{{ $property->address }}</p>
    </div>

    <form action="{{ route('viewings.store', $property) }}" method="POST" class="viewing-form">
        @csrf

        <div class="form-group">
            <label for="viewing_time">Viewing Time</label>
            <input type="datetime-local" 
                name="viewing_time" 
                id="viewing_time"
                min="{{ now()->addDay()->format('Y-m-d\TH:i') }}"
                required>
            @error('viewing_time')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="notes">Additional Notes (Optional)</label>
            <textarea 
                name="notes" 
                id="notes" 
                rows="4"
                placeholder="Any special requirements or questions...">{{ old('notes') }}</textarea>
            @error('notes')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-actions">
            <a href="{{ route('properties.show', $property) }}" class="btn btn-secondary">
                Cancel
            </a>
            <button type="submit" class="btn btn-primary">
                Schedule Viewing
            </button>
        </div>
    </form>
</div>

<style>
.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
}

.property-info {
    background: #f8f9fa;
    padding: 15px;
    margin-bottom: 20px;
    border: 1px solid #ddd;
    border-radius: 4px;
}

.property-info h2 {
    margin-top: 0;
    color: #333;
}

.address {
    color: #666;
    margin-bottom: 0;
}

.viewing-form {
    background: #fff;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 4px;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

.form-group input[type="datetime-local"],
.form-group textarea {
    width: 100%;
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 4px;
}

.error-message {
    color: #dc3545;
    margin-top: 5px;
    font-size: 0.9em;
}

.form-actions {
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
}

.btn {
    padding: 8px 16px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    text-decoration: none;
    display: inline-block;
}

.btn-primary {
    background-color: #007bff;
    color: white;
}

.btn-primary:hover {
    background-color: #0056b3;
}

.btn-secondary {
    background-color: #6c757d;
    color: white;
}

.btn-secondary:hover {
    background-color: #5a6268;
}
</style>
@endsection 