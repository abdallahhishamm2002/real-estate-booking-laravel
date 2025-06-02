@extends('master')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Search and Filter Section -->
    <div class="mb-8">
        <form action="{{ route('properties.index') }}" method="GET" class="bg-white p-6 rounded-lg shadow-md">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div>
                    <label for="location" class="block text-sm font-medium text-gray-700 mb-1">Location</label>
                    <select name="location" id="location" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        <option value="">All Locations</option>
                        <option value="Cairo" {{ request('location') == 'Cairo' ? 'selected' : '' }}>Cairo</option>
                        <option value="Giza" {{ request('location') == 'Giza' ? 'selected' : '' }}>Giza</option>
                        <option value="Alexandria" {{ request('location') == 'Alexandria' ? 'selected' : '' }}>Alexandria</option>
                        <option value="North Coast" {{ request('location') == 'North Coast' ? 'selected' : '' }}>North Coast</option>
                    </select>
                </div>
                <div>
                    <label for="type" class="block text-sm font-medium text-gray-700 mb-1">Property Type</label>
                    <select name="type" id="type" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        <option value="">All Types</option>
                        <option value="Apartment" {{ request('type') == 'Apartment' ? 'selected' : '' }}>Apartment</option>
                        <option value="Villa" {{ request('type') == 'Villa' ? 'selected' : '' }}>Villa</option>
                        <option value="Townhouse" {{ request('type') == 'Townhouse' ? 'selected' : '' }}>Townhouse</option>
                        <option value="Penthouse" {{ request('type') == 'Penthouse' ? 'selected' : '' }}>Penthouse</option>
                    </select>
                </div>
                <div>
                    <label for="price_range" class="block text-sm font-medium text-gray-700 mb-1">Price Range</label>
                    <select name="price_range" id="price_range" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        <option value="">Any Price</option>
                        <option value="0-3000000" {{ request('price_range') == '0-3000000' ? 'selected' : '' }}>Under 3M EGP</option>
                        <option value="3000000-5000000" {{ request('price_range') == '3000000-5000000' ? 'selected' : '' }}>3M - 5M EGP</option>
                        <option value="5000000-10000000" {{ request('price_range') == '5000000-10000000' ? 'selected' : '' }}>5M - 10M EGP</option>
                        <option value="10000000-999999999" {{ request('price_range') == '10000000-999999999' ? 'selected' : '' }}>Over 10M EGP</option>
                    </select>
                </div>
                <div>
                    <label for="bedrooms" class="block text-sm font-medium text-gray-700 mb-1">Bedrooms</label>
                    <select name="bedrooms" id="bedrooms" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        <option value="">Any</option>
                        <option value="1" {{ request('bedrooms') == '1' ? 'selected' : '' }}>1+</option>
                        <option value="2" {{ request('bedrooms') == '2' ? 'selected' : '' }}>2+</option>
                        <option value="3" {{ request('bedrooms') == '3' ? 'selected' : '' }}>3+</option>
                        <option value="4" {{ request('bedrooms') == '4' ? 'selected' : '' }}>4+</option>
                    </select>
                </div>
            </div>
            <div class="mt-4 flex justify-end space-x-4">
                <a href="{{ route('properties.index') }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">Reset</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Apply Filters</button>
            </div>
        </form>
    </div>

    <!-- Properties Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($properties as $property)
        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
            <!-- Property Image -->
            <div class="relative h-48">
                <img src="{{ $property->image }}" alt="{{ $property->title }}" class="w-full h-full object-cover">
                <div class="absolute top-2 right-2 bg-blue-600 text-white px-2 py-1 rounded text-sm">
                    {{ $property->type }}
                </div>
            </div>

            <!-- Property Details -->
            <div class="p-4">
                <h3 class="text-xl font-semibold mb-2">{{ $property->title }}</h3>
                <p class="text-gray-600 text-sm mb-4">{{ $property->location }}</p>

                <!-- Key Features -->
                <div class="grid grid-cols-3 gap-2 mb-4">
                    <div class="text-center">
                        <p class="text-sm text-gray-500">Bedrooms</p>
                        <p class="font-semibold">{{ $property->bedrooms }}</p>
                    </div>
                    <div class="text-center">
                        <p class="text-sm text-gray-500">Bathrooms</p>
                        <p class="font-semibold">{{ $property->bathrooms }}</p>
                    </div>
                    <div class="text-center">
                        <p class="text-sm text-gray-500">Area</p>
                        <p class="font-semibold">{{ $property->area }} m²</p>
                    </div>
                </div>

                <!-- Price and Action -->
                <div class="flex justify-between items-center mt-4">
                    <div class="text-blue-600 font-bold text-lg">
                        EGP {{ number_format($property->price, 2) }}
                    </div>
                    <a href="{{ route('properties.show', $property) }}" 
                       class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-lg hover:from-blue-600 hover:to-blue-700 transform hover:-translate-y-0.5 transition-all duration-300 shadow-lg hover:shadow-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        View Details
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-8">
        {{ $properties->links() }}
    </div>
</div>
@endsection