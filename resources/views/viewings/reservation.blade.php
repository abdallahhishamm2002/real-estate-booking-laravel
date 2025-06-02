@extends('layouts.app')

@section('content')
<div class="container">
    <div class="property-header">
        <h1>Schedule a Viewing</h1>
        <h2>{{ $property->title }}</h2>
        <p class="address">{{ $property->address }}</p>
    </div>

    <div class="reservation-container">
        <div class="property-details">
            <h3>Property Details</h3>
            <div class="details-grid">
                <div class="detail-item">
                    <span class="label">Type:</span>
                    <span class="value">{{ $property->type }}</span>
                </div>
                <div class="detail-item">
                    <span class="label">Bedrooms:</span>
                    <span class="value">{{ $property->bedrooms }}</span>
                </div>
                <div class="detail-item">
                    <span class="label">Bathrooms:</span>
                    <span class="value">{{ $property->bathrooms }}</span>
                </div>
                <div class="detail-item">
                    <span class="label">Area:</span>
                    <span class="value">{{ $property->area }} m²</span>
                </div>
                <div class="detail-item">
                    <span class="label">Price:</span>
                    <span class="value">EGP {{ number_format($property->price, 2) }}</span>
                </div>
            </div>
        </div>

        <div class="reservation-form">
            <h3>Select Viewing Time</h3>
            <form action="{{ route('viewings.store', $property) }}" method="POST">
                @csrf
                
                <div class="form-group">
                    <label for="viewing_date">Select Date</label>
                    <input type="date" 
                           id="viewing_date" 
                           name="viewing_date" 
                           min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                           required>
                </div>

                <div class="form-group">
                    <label for="viewing_time">Select Time</label>
                    <select id="viewing_time" name="viewing_time" required>
                        <option value="">Choose a time</option>
                        <option value="09:00">9:00 AM</option>
                        <option value="10:00">10:00 AM</option>
                        <option value="11:00">11:00 AM</option>
                        <option value="12:00">12:00 PM</option>
                        <option value="13:00">1:00 PM</option>
                        <option value="14:00">2:00 PM</option>
                        <option value="15:00">3:00 PM</option>
                        <option value="16:00">4:00 PM</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="notes">Additional Notes (Optional)</label>
                    <textarea id="notes" name="notes" rows="4" placeholder="Any special requirements or questions..."></textarea>
                </div>

                <div class="form-actions">
                    <a href="{{ route('properties.show', $property) }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Confirm Viewing</button>
                </div>
            </form>
        </div>

        <div class="agent-info">
            <h3>Property Agent</h3>
            <div class="agent-details">
                <p class="agent-name">{{ $property->broker_name }}</p>
                <p class="agent-phone">{{ $property->broker_phone }}</p>
                <p class="agent-email">{{ $property->broker_email }}</p>
            </div>
        </div>
    </div>
</div>

<style>
.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

.property-header {
    text-align: center;
    margin-bottom: 30px;
}

.property-header h1 {
    margin-bottom: 10px;
}

.address {
    color: #666;
}

.reservation-container {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 30px;
}

.property-details, .reservation-form, .agent-info {
    background: #fff;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 4px;
}

.details-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 15px;
}

.detail-item {
    display: flex;
    flex-direction: column;
}

.label {
    color: #666;
    font-size: 0.9em;
}

.value {
    font-weight: bold;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

.form-group input[type="date"],
.form-group select,
.form-group textarea {
    width: 100%;
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 4px;
}

.form-actions {
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
}

.btn {
    padding: 10px 20px;
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

.agent-info {
    grid-column: 1 / -1;
}

.agent-details {
    margin-top: 15px;
}

.agent-name {
    font-weight: bold;
    margin-bottom: 5px;
}

.agent-phone, .agent-email {
    color: #666;
    margin-bottom: 5px;
}

@media (max-width: 768px) {
    .reservation-container {
        grid-template-columns: 1fr;
    }
}
</style>
@endsection 