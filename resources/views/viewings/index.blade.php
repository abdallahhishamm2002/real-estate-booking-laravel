@extends('layouts.app')

@section('content')
<div class="viewings-container">
    <div class="viewings-header">
        <h1>My Scheduled Viewings</h1>
        <p class="subtitle">Manage your property viewings and appointments</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i>
            {{ session('success') }}
        </div>
    @endif

    @if($viewings->isEmpty())
        <div class="empty-state">
            <div class="empty-state-icon">
                <i class="fas fa-calendar-times"></i>
            </div>
            <h2>No Scheduled Viewings</h2>
            <p>You haven't scheduled any property viewings yet.</p>
            <a href="{{ route('properties.index') }}" class="btn btn-primary">
                <i class="fas fa-search"></i>
                Browse Properties
            </a>
        </div>
    @else
        <div class="viewings-grid">
            @foreach($viewings as $viewing)
                <div class="viewing-card">
                    <div class="viewing-image">
                        <img src="{{ $viewing->property->imageUrl }}" 
                             alt="{{ $viewing->property->title }}"
                             onerror="this.src='{{ asset('images/default-property.jpg') }}'">
                    </div>
                    <div class="viewing-content">
                        <div class="property-info">
                            <h2>{{ $viewing->property->title }}</h2>
                            <p class="address">
                                <i class="fas fa-map-marker-alt"></i>
                                {{ $viewing->property->address }}
                            </p>
                            <div class="status-badge status-{{ $viewing->status }}">
                                {{ ucfirst($viewing->status) }}
                            </div>
                        </div>
                        
                        <div class="viewing-details">
                            <div class="detail-item">
                                <i class="fas fa-clock"></i>
                                <div class="detail-content">
                                    <span class="detail-label">Scheduled Time</span>
                                    <span class="detail-value">{{ $viewing->viewing_time->format('F j, Y g:i A') }}</span>
                                </div>
                            </div>
                            
                            @if($viewing->notes)
                                <div class="detail-item">
                                    <i class="fas fa-sticky-note"></i>
                                    <div class="detail-content">
                                        <span class="detail-label">Notes</span>
                                        <span class="detail-value">{{ $viewing->notes }}</span>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="viewing-actions">
                            <a href="{{ route('properties.show', $viewing->property) }}" class="btn btn-outline">
                                <i class="fas fa-eye"></i>
                                View Property
                            </a>
                            <form action="{{ route('viewings.destroy', $viewing) }}" method="POST" class="cancel-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" 
                                    onclick="return confirm('Are you sure you want to cancel this viewing?')">
                                    <i class="fas fa-times"></i>
                                    Cancel Viewing
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

<style>
/* Navigation Bar Styles */
.navbar {
    background-color: #ffffff;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    padding: 0.75rem 0;
}

.navbar .container {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 1rem;
}

.navbar-brand {
    font-size: 1.5rem;
    font-weight: 700;
    color: #10b981;
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.navbar-brand:hover {
    color: #059669;
}

.navbar-nav {
    display: flex;
    align-items: center;
    gap: 1.5rem;
    margin: 0;
    padding: 0;
    list-style: none;
}

.nav-item {
    position: relative;
}

.nav-link {
    color: #4b5563;
    text-decoration: none;
    font-weight: 500;
    padding: 0.5rem 1rem;
    transition: all 0.2s;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    border-radius: 0.375rem;
}

.nav-link:hover {
    color: #10b981;
    background-color: #f0fdf4;
}

.nav-link.active {
    color: #10b981;
    background-color: #f0fdf4;
}

.nav-link i {
    font-size: 1.1rem;
}

.btn-link.nav-link {
    background: none;
    border: none;
    padding: 0.5rem 1rem;
    color: #4b5563;
}

.btn-link.nav-link:hover {
    color: #10b981;
    background-color: #f0fdf4;
}

.navbar-toggler {
    border: none;
    padding: 0.5rem;
    display: none;
}

.navbar-toggler:focus {
    box-shadow: none;
}

@media (max-width: 768px) {
    .navbar-toggler {
        display: block;
    }

    .navbar-nav {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background: white;
        padding: 1rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        flex-direction: column;
        gap: 0.5rem;
    }

    .navbar-nav.show {
        display: flex;
    }

    .nav-item {
        width: 100%;
        margin: 0;
    }

    .nav-link {
        padding: 0.75rem 1rem;
        width: 100%;
    }

    .btn-link.nav-link {
        padding: 0.75rem 1rem;
        width: 100%;
        text-align: left;
    }
}

/* Viewings Page Styles */
.viewings-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 2rem;
}

.viewings-header {
    text-align: center;
    margin-bottom: 3rem;
}

.viewings-header h1 {
    font-size: 2.5rem;
    color: #1a1a1a;
    margin-bottom: 0.5rem;
    font-weight: 700;
}

.subtitle {
    color: #666;
    font-size: 1.1rem;
}

.alert {
    padding: 1rem 1.5rem;
    border-radius: 0.5rem;
    margin-bottom: 2rem;
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.alert-success {
    background-color: #f0fdf4;
    color: #059669;
    border: 1px solid #a7f3d0;
}

.alert i {
    font-size: 1.25rem;
}

.empty-state {
    text-align: center;
    padding: 4rem 2rem;
    background-color: #f9fafb;
    border-radius: 1rem;
    margin: 2rem 0;
}

.empty-state-icon {
    font-size: 4rem;
    color: #9ca3af;
    margin-bottom: 1.5rem;
}

.empty-state h2 {
    font-size: 1.5rem;
    color: #1f2937;
    margin-bottom: 1rem;
}

.empty-state p {
    color: #6b7280;
    margin-bottom: 2rem;
}

.viewings-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
    gap: 2rem;
}

.viewing-card {
    background: white;
    border-radius: 1rem;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s, box-shadow 0.2s;
}

.viewing-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
}

.status-badge {
    display: inline-block;
    padding: 0.5rem 1rem;
    border-radius: 0.5rem;
    font-size: 0.875rem;
    font-weight: 600;
    text-transform: uppercase;
    margin-top: 0.5rem;
}

.status-scheduled {
    background-color: #dbeafe;
    color: #1e40af;
}

.status-completed {
    background-color: #dcfce7;
    color: #166534;
}

.status-cancelled {
    background-color: #fee2e2;
    color: #991b1b;
}

.viewing-content {
    padding: 1.5rem;
}

.property-info h2 {
    font-size: 1.25rem;
    color: #1f2937;
    margin-bottom: 0.5rem;
    font-weight: 600;
}

.address {
    color: #6b7280;
    font-size: 0.875rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.viewing-details {
    margin: 1.5rem 0;
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.detail-item {
    display: flex;
    align-items: flex-start;
    gap: 1rem;
}

.detail-item i {
    color: #10b981;
    font-size: 1.25rem;
    margin-top: 0.25rem;
}

.detail-content {
    flex: 1;
}

.detail-label {
    display: block;
    font-size: 0.75rem;
    color: #6b7280;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    margin-bottom: 0.25rem;
}

.detail-value {
    display: block;
    color: #1f2937;
    font-weight: 500;
}

.viewing-actions {
    display: flex;
    gap: 1rem;
    margin-top: 1.5rem;
}

.btn {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.75rem 1.5rem;
    border-radius: 0.5rem;
    font-weight: 500;
    transition: all 0.2s;
    text-decoration: none;
    border: none;
    cursor: pointer;
}

.btn-outline {
    background: white;
    border: 1px solid #10b981;
    color: #10b981;
}

.btn-outline:hover {
    background: #f0fdf4;
    color: #059669;
}

.btn-danger {
    background: #fee2e2;
    color: #dc2626;
    border: 1px solid #fecaca;
}

.btn-danger:hover {
    background: #fecaca;
    color: #b91c1b;
}

.btn i {
    font-size: 1rem;
}

.cancel-form {
    margin: 0;
}

@media (max-width: 768px) {
    .viewings-container {
        padding: 1rem;
    }

    .viewings-grid {
        grid-template-columns: 1fr;
    }

    .viewing-actions {
        flex-direction: column;
    }

    .btn {
        width: 100%;
        justify-content: center;
    }
}
</style>
@endsection 