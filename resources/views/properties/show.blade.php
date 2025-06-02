@extends('layouts.app')

@section('content')
<div class="property-show">
    <!-- Property Header -->
    <div class="property-header" style="background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('{{ $property->image ? asset('storage/' . $property->image) : asset('images/default-property.jpg') }}') no-repeat center center; background-size: cover;">
        <div class="container">
            <h1>{{ $property->title }}</h1>
            <p class="address">{{ $property->address }}</p>
            <div class="price-tag">
                <span>EGP {{ number_format($property->price, 2) }}</span>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container">
        <div class="property-content">
            <!-- Property Image -->
            <div class="property-image">
                <img src="{{ $property->image ? asset('storage/' . $property->image) : asset('images/default-property.jpg') }}" 
                     alt="{{ $property->title }}"
                     onerror="this.src='{{ asset('images/default-property.jpg') }}'">
            </div>

            <!-- Property Details -->
            <div class="property-details">
                <div class="features-grid">
                    <div class="feature">
                        <i class="fas fa-bed"></i>
                        <span>{{ $property->bedrooms }} Bedrooms</span>
                    </div>
                    <div class="feature">
                        <i class="fas fa-bath"></i>
                        <span>{{ $property->bathrooms }} Bathrooms</span>
                    </div>
                    <div class="feature">
                        <i class="fas fa-ruler-combined"></i>
                        <span>{{ $property->area }} m²</span>
                    </div>
                    <div class="feature">
                        <i class="fas fa-building"></i>
                        <span>{{ $property->type }}</span>
                    </div>
                </div>

                <div class="description">
                    <h3>Description</h3>
                    <p>{{ $property->description }}</p>
                </div>

                <div class="details-section">
                    <h3>Property Details</h3>
                    <div class="details-grid">
                        <div class="detail-item">
                            <span class="label">Status:</span>
                            <span class="value">{{ $property->status }}</span>
                        </div>
                        <div class="detail-item">
                            <span class="label">Furnished:</span>
                            <span class="value">{{ $property->furnished ? 'Yes' : 'No' }}</span>
                        </div>
                        <div class="detail-item">
                            <span class="label">Year Built:</span>
                            <span class="value">{{ $property->year_built }}</span>
                        </div>
                        <div class="detail-item">
                            <span class="label">City:</span>
                            <span class="value">{{ $property->city }}</span>
                        </div>
                        <div class="detail-item">
                            <span class="label">Neighborhood:</span>
                            <span class="value">{{ $property->neighborhood }}</span>
                        </div>
                    </div>
                </div>

                <div class="amenities">
                    <h3>Amenities</h3>
                    <div class="amenities-grid">
                        @if($property->amenities)
                            @foreach(explode(',', $property->amenities) as $amenity)
                                <div class="amenity-item">
                                    <i class="fas fa-check"></i>
                                    <span>{{ trim($amenity) }}</span>
                                </div>
                            @endforeach
                        @else
                            <p>No amenities listed</p>
                        @endif
                    </div>
                </div>

                <div class="agent-info">
                    <h3>Property Agent</h3>
                    <div class="agent-card">
                        <div class="agent-details">
                            <p class="agent-name">{{ $property->broker_name }}</p>
                            <p class="agent-phone">
                                <i class="fas fa-phone"></i>
                                {{ $property->broker_phone }}
                            </p>
                            <p class="agent-email">
                                <i class="fas fa-envelope"></i>
                                {{ $property->broker_email }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="property-actions">
                    @auth
                        <a href="{{ route('viewings.reservation', $property) }}" class="btn btn-primary">
                            <i class="fas fa-calendar-alt"></i>
                            Schedule a Viewing
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary">
                            <i class="fas fa-calendar-alt"></i>
                            Schedule a Viewing
                        </a>
                    @endauth
                    <a href="tel:{{ $property->broker_phone }}" class="btn btn-secondary">
                        <i class="fas fa-phone"></i>
                        Contact Agent
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.property-show {
    background-color: #f8f9fa;
    min-height: 100vh;
}

.property-header {
    color: white;
    padding: 60px 0;
    margin-bottom: 30px;
    text-align: center;
    position: relative;
}

.property-header::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6));
    z-index: 1;
}

.property-header .container {
    position: relative;
    z-index: 2;
}

.property-header h1 {
    font-size: 2.5rem;
    margin-bottom: 10px;
    font-weight: 700;
}

.address {
    font-size: 1.2rem;
    margin-bottom: 20px;
    opacity: 0.9;
}

.price-tag {
    display: inline-block;
    background-color: #007bff;
    color: white;
    padding: 10px 20px;
    border-radius: 30px;
    font-size: 1.2rem;
    font-weight: 600;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.property-content {
    display: grid;
    grid-template-columns: 1fr;
    gap: 30px;
    margin-bottom: 50px;
}

.property-image {
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    aspect-ratio: 16/9;
    background-color: #f8f9fa;
}

.property-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

.property-details {
    background: white;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
    margin-bottom: 30px;
}

.feature {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 15px;
    background: #f8f9fa;
    border-radius: 8px;
}

.feature i {
    color: #007bff;
    font-size: 1.2rem;
}

.description {
    margin-bottom: 30px;
}

.description h3 {
    font-size: 1.5rem;
    margin-bottom: 15px;
    color: #333;
}

.description p {
    line-height: 1.6;
    color: #666;
}

.details-section {
    margin-bottom: 30px;
}

.details-section h3 {
    font-size: 1.5rem;
    margin-bottom: 15px;
    color: #333;
}

.details-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 15px;
}

.detail-item {
    display: flex;
    justify-content: space-between;
    padding: 10px;
    background: #f8f9fa;
    border-radius: 8px;
}

.detail-item .label {
    color: #666;
    font-weight: 500;
}

.detail-item .value {
    color: #333;
    font-weight: 600;
}

.amenities {
    margin-bottom: 30px;
}

.amenities h3 {
    font-size: 1.5rem;
    margin-bottom: 15px;
    color: #333;
}

.amenities-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 15px;
}

.amenity-item {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 10px;
    background: #f8f9fa;
    border-radius: 8px;
}

.amenity-item i {
    color: #28a745;
}

.agent-info {
    margin-bottom: 30px;
}

.agent-info h3 {
    font-size: 1.5rem;
    margin-bottom: 15px;
    color: #333;
}

.agent-card {
    background: #f8f9fa;
    padding: 20px;
    border-radius: 8px;
}

.agent-details p {
    margin-bottom: 10px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.agent-name {
    font-size: 1.2rem;
    font-weight: 600;
    color: #333;
}

.agent-phone, .agent-email {
    color: #666;
}

.agent-phone i, .agent-email i {
    color: #007bff;
}

.property-actions {
    display: flex;
    gap: 15px;
    margin-top: 30px;
}

.btn {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 12px 24px;
    border-radius: 8px;
    font-weight: 500;
    text-decoration: none;
    transition: all 0.2s;
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

@media (max-width: 768px) {
    .property-header {
        padding: 40px 0;
    }

    .property-header h1 {
        font-size: 2rem;
    }

    .property-content {
        grid-template-columns: 1fr;
    }

    .property-actions {
        flex-direction: column;
    }

    .btn {
        width: 100%;
        justify-content: center;
    }
}
</style>

<!-- Add Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endsection 